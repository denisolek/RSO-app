<?php
require_once('database.php');

function session_check()
{
        if(!isset($_COOKIE['MYSID'])) {
                $token=md5(rand(0,1000000000));
                setcookie('MYSID', $token);
                $user=array('id'=>NULL,'name'=>"anonymous", 'surname'=>"user");
                redis_set_json($token, $user,0);
        }
        else
                $token=$_COOKIE['MYSID'];
        if (isset($_POST['username']) and isset($_POST['password']))
                return authorize($_POST['username'],$_POST['password'],$token);
        else
                return authorize(NULL,NULL,$token);
}

function authorize($username,$password, $token)
{
        global $db;
        if ($username != NULL && $password != NULL && $username != '' && $password != '')
        {
                    $db_password = $db->get_user_password($username);
                    $db_id = $db->find_id_by_username($username);
                    $db_user = $db->fetch_user_data($db_id);
                    if ($db_password != NULL && $password == $db_password && $db_id != NULL) {
                        $user = (array) $db_user;
                    } else {
                        alert('Wrong username or password');
                        $user=array('id'=>NULL,'name'=>"anonymous", 'surname'=>"user");
                    }
                    redis_set_json($token,$user,"0");
        }
                return redis_get_json($token);

}

function logout($user)
{
        $token=$_COOKIE['MYSID'];
        $user=array('id'=>NULL,'name'=>"anonymous", 'surname'=>"user");
        redis_set_json($token,$user,"0");
        return $user;
}

function redis_set_json($key, $val, $expire)
{
        $redisClient = new Redis();
        $redisClient->connect( '192.168.17.133', 6379 );
                $value=str_replace('\\u0000UserService\\u0000_', '', json_encode($val));
        if ($expire > 0)
                $redisClient->setex($key, $expire, $value );
        else
                $redisClient->set($key, $value);
        $redisClient->close();
}

function redis_get_json($key)
{
        $redisClient = new Redis();
        $redisClient->connect( '192.168.17.133', 6379 );
        $ret=json_decode($redisClient->get($key),true);
        $redisClient->close();
        return $ret;
}

function add_admin() {
    global $db;
    $id = $db->find_id_by_username($username);
    if ($id == null) {
        $db->add_admin();
    } else {
        return false;
    }
}

function register($username, $password) {
        global $db;
        $db->add_user($username, $password);
}

function alert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function redirect($url) {
  header('Location: ' . $url);
  die();
}

function redirectJS($url) {
  echo '<script>window.location.replace("'.$url.'");</script>';
}

function isUsernameAvailable($username) {
    global $db;
    $id = $db->find_id_by_username($username);

    if ($id == null) {
        return true;
    } else {
        return false;
    }
}

function show($variable) {
  if ($variable == NULL ) {
    return 'EMPTY';
  } else {
    return $variable;
  }
}

function updateProfile($id, $name, $surname, $nip, $pesel, $address) {
  global $db;
  if ((checkPESEL($pesel) || $pesel == 'EMPTY') && (checkNIP($nip) || $nip == 'EMPTY')) {
    $db->update_user($id, $name, $surname, $nip, $pesel, $address);
    if ($db) {
      $db_user = $db->fetch_user_data($id);
      $token=$_COOKIE['MYSID'];
      redis_set_json($token,(array) $db_user,"0");
      return redis_get_json($token);
    }
  } else {
    alert('Wrong NIP or PESEL format');
  }
}

function checkPESEL($str){
    if (!preg_match('/^[0-9]{11}$/',$str))
    {
        return false;
    }

    $arrSteps = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
    $intSum = 0;
    for ($i = 0; $i < 10; $i++)
    {
        $intSum += $arrSteps[$i] * $str[$i];
    }
    $int = 10 - $intSum % 10;
    $intControlNr = ($int == 10)?0:$int;
    if ($intControlNr == $str[10])
    {
        return true;
    }
    return false;
}

function checkNIP($str){
    $str = preg_replace("/[^0-9]+/","",$str);
    if (strlen($str) != 10)
    {
        return false;
    }

    $arrSteps = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
    $intSum=0;
    for ($i = 0; $i < 9; $i++)
    {
        $intSum += $arrSteps[$i] * $str[$i];
    }
    $int = $intSum % 11;

    $intControlNr=($int == 10)?0:$int;
    if ($intControlNr == $str[9])
    {
        return true;
    }
    return false;
}