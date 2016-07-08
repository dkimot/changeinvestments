<?php
session_start();
require "mysql_connect.php";

	$_POST["username"] = $username;

	$query = "SELECT * FROM user_info WHERE username='$username'";

	try {
		$result = $db_user_info->query($query);
	} catch (Exception $e) {
		echo "query failure";
		exit;
	};
	
	$user_check = $result->rowCount();
	
	if ($user_check > 0) {
		echo "Username already exists";
		$_SESSION["unique_user"] = false;
	} else {
		echo "That's a unique username!";
		$_SESSION["unique_user"] = true;
	};
	
?>