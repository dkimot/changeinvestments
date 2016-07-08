<?php
session_start();
include("../pdo_connect.php");
include("../../sql_session_vars.php");
$username = $_SESSION['username'];
// Check to see where the POST is coming from
	if ($_SESSION['form'] == "name") {
		// Set POST vars
			$name = $_POST['name'];
			$surname = $_POST['surname'];
			$mi = $_POST['mi'];
			$title = $_POST['title'];
		// Query the db
			$query = "UPDATE `registered_users` SET name = '$name', surname = '$surname', mi = '$mi', title = '$title' WHERE username = '$username';";
			$params = array();
			$results = dataQuery($query,$params);
		// Query to check results (TROUBLESHOOTING ONLY)
			$query = "SELECT * FROM `registered_users` WHERE username = '$username';";
			$params = array();
			$results = dataQuery($query,$params);
			$_SESSION['name'] = $results[0]['name'];
		// Send back to account page
			?>
			
				<script type="text/javascript">
					window.location.href = 'https://www.changeinvestmentscorp.com/account_page.php';
				</script>
			
			<?php
	} elseif ($_SESSION['form'] == "address") {
		// Set POST vars
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
		// Query the db
			$query = "UPDATE `registered_users` SET address = '$address', city = '$city', state = '$state', zip = '$zip' WHERE username = '$username';";
			$params = array();
			$results = dataQuery($query,$params);
		// Send back to account page
			?>
			
				<script type="text/javascript">
					window.location.href = 'https://www.changeinvestmentscorp.com/account_page.php';
				</script>
			
			<?php
	} elseif ($_SESSION['form'] == "identity") {
		// Set POST vars
			$dob = $_POST['dob'];
			$ssn = password_hash($_POST['ssn'], PASSWORD_DEFAULT);
			$gender = $_POST['gender'];
		// Query the db
			$query = "UPDATE `registered_users` SET dob = '$dob', ssn = '$ssn', mi = '$mi', title = '$title' WHERE username = '$username';";
			$params = array();
			$results = dataQuery($query,$params);
		// Send back to account page
			?>
			
				<script type="text/javascript">
					window.location.href = 'https://www.changeinvestmentscorp.com/account_page.php';
				</script>
			
			<?php
	} elseif ($_SESSION['form'] == "bank") {
		// Set POST vars
			$bank = password_hash($_POST['bank'], PASSWORD_DEFAULT);
			$bank_account_number = password_hash($_POST['bank_account_number'], PASSWORD_DEFAULT);
			$routing_number = password_hash($_POST['routing_number'], PASSWORD_DEFAULT);
		// Query the db
			$query = "INSERT INTO `registered_users` (dob, ssn, gender) VALUES ('$dob','$ssn','$gender') WHERE username = '$username';";
			$params = array();
			$results = dataQuery($query,$params);
		// Send back to account page
			?>
			
				<script type="text/javascript">
					window.location.href = 'https://www.changeinvestmentscorp.com/account_page.php';
				</script>
			
			<?php
	} else {
		// Send back to account page
			?>
			
				<script type="text/javascript">
					window.location.href = 'https://www.changeinvestmentscorp.com/account_page.php';
				</script>
			
			<?php
	};