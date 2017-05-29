<?php
require_once('database.php');

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
