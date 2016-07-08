<?php
session_start();

// Set username
	$username = $_SESSION['username'];

// Includes
	include("inc/header.php");
	include("inc/pdo_connect.php");
	include("sql_session_vars.php");

// Test echo
	echo $name;

// Check that account exists in registered users or temporary users (if temp users we need to direct them to their inbox)
	// First query, directed at registered users
		$query = "SELECT * FROM `registered_users` WHERE username = '$username';";
		$params = array();
		$results = dataQuery($query, $params);
	// Second query, directed at temp users
		$query = "SELECT * FROM `temp_users` WHERE username = '$username';";
		$params = array();
		$results2 = dataQuery($query, $params);
	// If statement that checks existence of user account
		if ($results[0]['email'] == NULL && $results2[0]['email'] == NULL) {
			echo "<p>This is a message for people attempting to access the account page without a valid account</p>";
			echo "<p><a href=\"https://www.changeinvestments.com/create_account.php\">Start investing now!</a></p>";
			exit;
		} elseif ($results2[0]['email'] != NULL) {
			echo "<p>This is a message for people who have a temporary account and need to confirm their account</p>";
		} else {};

// Set if functions to check account confirmation
	if ($account_verification == 1) {
		include("inc/account/home.php");
	}	
		// Check level 1 (name)
			elseif ($name != NULL && $surname != NULL) {
			// Check level 2 (address), if the name is not set
			// Note: $state != NULL was removed because the state form isn't working
				if($address != NULL && $city != NULL && $zip != NULL) {
				include_once("inc/account/home.php");
				/*
				// Check level 3 (identity), if the address is not set
					if($dob != NULL && $ssn != NULL) {
					// Check level 4 (bank info), if the identity info is not set
						if($bank != NULL && $bank_account_number != NULL) {
						
						} else {
						// Bank info has not been set, let's set it
							include_once("inc/account/bank.php");
						};
					} else {
					// Identification info has not been set, let's set it
						include_once("inc/account/identity.php");
					};
				*/
				} else {
				// Address has not been set, let's set it
					include_once("inc/account/address.php");
				};
			} else {
			// Name has not been set, let's set it
				include_once("inc/account/name.php");
			};

include("inc/footer.php");
?>