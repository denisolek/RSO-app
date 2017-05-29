<?php
	include('./classes/user.php');
	
	class Database {

		public $c;

		public function __construct() {
      include ('./config/connection.php');
			$this->c = new mysqli($servername_master, $username_master, $password_master, $dbname_master);
			if ($this->c->connect_error) {
				die("Failed to connect with db: " . $c->connect_error);
			}
		}

		public function add_admin() {
			$query = "INSERT INTO user (username, password, isAdmin)
								VALUES ('admin', 'admin', true)";
			$result = $this->c->query($query);
		}

    public function add_user($username, $password) {
			$query = "INSERT INTO user (username, password)
								VALUES (\"" . $username . "\", \"" . $password . "\")";
			$result = $this->c->query($query);
		}

		public function find_id_by_username($username) {
			$query = "SELECT id FROM user WHERE username = '" . $username . "'";
			$result = $this->c->query($query);

			if ($result->num_rows > 0) {
				$id = $result->fetch_assoc()['id'];
			} else {
				return null;
			}
			return $id;
		}

		public function get_user_password($username) {
			$query = "SELECT password FROM user WHERE username = '" . $username . "'";

			$result = $this->c->query($query);

			if ($result->num_rows>0) {
				$password = $result->fetch_assoc()['password'];
			} else {
				return null;
			}
			return $password;
		}

		public function fetch_user_data($username) {

			$query = "SELECT * FROM user WHERE username = '" . $username . "'";

			$result = $this->c->query($query);


			if ($result->num_rows==1) {
				$data = array();
				while($single = $result->fetch_assoc()){
				   $data[] = $single;
				}
				$user = new UserService($data[0]['id'],
																$data[0]['name'],
																$data[0]['surname'],
																$data[0]['nip'],
																$data[0]['pesel'],
																$data[0]['address'],
																$data[0]['avatar']);
			} else {
				return null;
			}
			return $user;
		}
	}

	$db = new Database();
?>
