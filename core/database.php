<?php
    include('./classes/user.php');

    class Database {

        public $c;

        public function connectMaster() {
          include ('./config/connection_config.php');
          $this->c = new mysqli($servername_master, $username_master, $password_master, $dbname_master);
          if ($this->c->connect_error) {
              die("Failed to connect with db: " . $c->connect_error);
          }
        }

        public function connect() {
          include ('./config/connection_config.php');
          $this->c = new mysqli($servername_slave, $username_slave, $password_slave, $dbname_slave);
          if ($this->c->connect_error) {
            var_dump('CONNECT TO MASTER');
            $this->c = new mysqli($servername_master, $username_master, $password_master, $dbname_master);
            if ($this->c->connect_error) {
                die("Failed to connect with db: " . $c->connect_error);
            }
          }
        }

        public function disconnect() {
          mysqli_close($this->c);
        }

        public function add_admin() {
          $this->connectMaster();
            $query = "INSERT INTO user (username, password, name, surname, isAdmin)
                                VALUES ('admin', 'admin', 'Admin', ' ', true)";
            $result = $this->c->query($query);
            $this->disconnect();
        }

        public function add_user($username, $password, $name, $surname) {
          $this->connectMaster();
            $query = "INSERT INTO user (username, password, name, surname)
                                VALUES (\"" . $username . "\", \"" . $password . "\", \"" . $name . "\", \"" . $surname . "\")";
            $result = $this->c->query($query);
            $this->disconnect();
        }

        public function update_user($id, $name, $surname, $nip, $pesel, $address)
        {
          $this->connectMaster();
            $query = "UPDATE user
                                SET name = '$name', surname = '$surname', nip = '$nip', pesel = '$pesel', address = '$address'
                                WHERE id = '$id'";
            $result = $this->c->query($query);
            $this->disconnect();

            if ($result) {
                return true;
            } else {
                return false;
            }
        }

        public function find_id_by_username($username) {
            $this->connect();
            $query = "SELECT id FROM user WHERE username = '" . $username . "'";
            $result = $this->c->query($query);
            $this->disconnect();

            if ($result->num_rows > 0) {
                $id = $result->fetch_assoc()['id'];
            } else {
                return null;
            }
            return $id;
        }

        public function get_user_password($username) {
            $this->connect();
            $query = "SELECT password FROM user WHERE username = '" . $username . "'";

            $result = $this->c->query($query);
            $this->disconnect();

            if ($result->num_rows>0) {
                $password = $result->fetch_assoc()['password'];
            } else {
                return null;
            }
            return $password;
        }

        public function fetch_user_data($id) {
            $this->connect();
            $query = "SELECT * FROM user WHERE id = '" . $id . "'";

            $result = $this->c->query($query);
            $this->disconnect();

            if ($result->num_rows==1) {
                $data = array();
                while($single = $result->fetch_assoc()){
                   $data[] = $single;
                }
                $user = new UserService($data[0]['id'],
                                        $data[0]['username'],
                                        $data[0]['name'],
                                        $data[0]['surname'],
                                        $data[0]['nip'],
                                        $data[0]['pesel'],
                                        $data[0]['address'],
                                        $data[0]['isAdmin']);
            } else {
                return null;
            }
            return $user;
        }

        public function fetch_posts() {
          $this->connect();
          $query = "SELECT post.id, post.text, post.createdOn, user.name, user.surname, user.username
                    FROM post
                    INNER JOIN user
                    ON post.user=user.id
                    WHERE post.isAccepted = 1
                    ORDER BY post.id DESC LIMIT 10";

          $result = $this->c->query($query);
          $this->disconnect();
          $posts = array();

          if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              array_push($posts, $row);
            }
          }
          return $posts;
        }

        public function fetch_post_by_id($id) {
          $this->connect();
          $query = "SELECT post.id, post.text, post.createdOn, user.name, user.surname
                    FROM post
                    INNER JOIN user
                    ON post.user=user.id
                    WHERE post.id = '" . $id . "'";
          $result = $this->c->query($query);
          $this->disconnect();

          if ($result->num_rows>0) {
              return $result->fetch_assoc();
          } else {
              return null;
          }
        }

        public function add_post($id, $text) {
          $this->connectMaster();
          $query = "INSERT INTO post (text, user, createdOn)
                              VALUES (\"" . $text . "\", \"" . $id . "\", NOW())";
          $result = $this->c->query($query);
          $this->disconnect();

          if ($result) {
            $addedIndex = $this->c->insert_id;
            $post = $this->fetch_post_by_id($addedIndex);
            addMessageToReview(json_encode($post));
            return true;
          } else {
            return false;
          }
        }

        public function waiting_posts_count($id) {
          $this->connect();
          $query = "SELECT count(*)
                    AS total_count
                    FROM post
                    WHERE user = '" . $id . "' AND verified = false";

          $result = $this->c->query($query);
          $this->disconnect();
          $data= $result->fetch_assoc()['total_count'];
          return $data;
        }

        public function admin_waiting_posts_count() {
          $this->connect();
          $query = "SELECT count(*)
                    AS total_count
                    FROM post
                    WHERE verified = false";

          $result = $this->c->query($query);
          $this->disconnect();
          $data= $result->fetch_assoc()['total_count'];
          return $data;
        }

        public function accept_post($id) {
          $this->connectMaster();
          $query = "UPDATE post
                    SET isAccepted = 1, verified = 1
                    WHERE id = '$id'";
          $result = $this->c->query($query);
          $this->disconnect();
          if ($result) {
              return true;
          } else {
              return false;
          }
        }

        public function decline_post($id) {
          $this->connectMaster();
          $query = "UPDATE post
                    SET verified = 1
                    WHERE id = '$id'";
          $result = $this->c->query($query);
          $this->disconnect();
          if ($result) {
              return true;
          } else {
              return false;
          }
        }
    }

    $db = new Database();
?>
