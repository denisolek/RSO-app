<?php
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
	}

	$db = new Database();
?>
