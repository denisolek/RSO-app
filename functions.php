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
					$db_user = $db->fetch_user_data($username);
					if ($db_password != NULL && $password == $db_password) {
						$user = (array) $db_user;
					} else {
						alert('Wrong username or password');
						$user=array('id'=>NULL,'name'=>"anonymous", 'surname'=>"user");
					}

					redis_set_json($token,$user,"0");
					return $user;
        } else {
					return redis_get_json($token);
				}
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

function isUsernameAvailable($username) {
	global $db;
	$id = $db->find_id_by_username($username);

	if ($id == null) {
		return true;
	} else {
		return false;
	}
}
