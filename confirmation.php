<?php

include('inc/pdo_connect.php');

// Check that passkey is set
	if(isset($_GET['passkey'])) {} else {exit;};

// Passkey they got from the link
	$passkey = $_GET['passkey'];

// Retrieve data from table row that matches this passkey
	$query = "SELECT * FROM `temp_users` WHERE confirm_key = '$passkey';";
	$params = array();
	$results = dataQuery($query,$params);
	
// If successfully queried
	$suphp = true;
	if ($suphp == true) {
	// If passkey is found, retrieve data from temp_users
		if ($suphp == true) {
			$username = $results[0]["username"];
			$email = $results[0]["email"];
			$password = $results[0]["password"];
			// Insert data into 'registered_members'
				$query = "INSERT INTO `registered_users` (username, email, password) VALUES ('$username','$email','$password');";
				$params = array();
				$results2 = dataQuery($query,$params);
	// If passkey is not found, display message
		} else {
			?>
			<script type="text/javascript">
				alert("Incorrect confirmation code");
			</script>
			<?php
			exit;
		};
		
	// If data is successfully moved, display message and delete temporary data
	var_dump($results2);
		if($suphp == true) {
			?>
			<script type="text/javascript">
				alert("Your account has been successfully activated!");
			</script>
			<?php
			// Delete temporary info
				$query = "DELETE FROM `temp_users` WHERE confirm_key='?';";
				$params = array($passkey);
				$results3 = dataQuery($query,$params);
		};
	} else {echo "$results is null and/or empty";};
?>