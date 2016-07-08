<?php
//include("inc/pdo_connect.php");

	$query = "SELECT * FROM registered_users WHERE username='$username'";
	$params = array();
	$results = dataQuery($query,$params);

	// Set the sql variables
	$account_verification = $results[0]['account_verification'];
	$username = $results[0]['username'];
	$name = $results[0]['name'];
	$surname = $results[0]['surname'];
	$mi = $results[0]['mi'];
	$title = $results[0]['title'];
	$gender = $results[0]['gender'];
	$ssn = $results[0]['phone_number'];
	$bank_account_number = $results[0]['bank_account_number'];
	$bank = $results[0]['bank'];
	$routing_number = $results[0]['bank_routing_number'];
	$pin = $results[0]['change_pin'];
	$dob = $results[0]['dob'];
	$account_value = $results[0]['account_value'];
	$account_yield = $results[0]['account_yield'];
	$account_signup_date = $results[0]['account_signup_date'];
	$address = $results[0]['address'];
	$city = $results[0]['city'];
	$state = $results[0]['state'];
	$zip = $results[0]['zip'];

?>