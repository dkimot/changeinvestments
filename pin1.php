<?php
session_start();
include("inc/pdo_connect.php");
include("sql_session_vars.php");

$_POST["pin"] = $pin;

// Check that the PIN's are the same
	if ($_POST["pin"] === $_SESSION["pin"]) {
		$query = "INSERT INTO `registered_users` `change_pin` VALUES ('$pin')";
		$params = array();
		$results = dataQuery($query,$params);
	}

?>