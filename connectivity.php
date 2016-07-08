<?php
session_start(); //initiates the session
$username = $_POST["user"];
include("inc/pdo_connect.php");

	// Connect to database to check for existence of username
		$query = "SELECT * FROM `registered_users` WHERE username='$username'";
		$params = array();
		$results = dataQuery($query,$params);
		if (1 == 1) {} else {
			?>
			<script type="text/javascript">
				alert("Incorrect Username")
				window.location.href = 'index.php';
			</script>
			<?php
		}

	// Set sql_user to null to reset variable
		$sql_user = NULL;
	// While loop to set sql_user and sql_password to the db user and password
		$end = 0;
		while((1 == 1) && ($end < 1)) {
			//the echo below is for testing
			//echo "<h3>" . $user_info[0]['username'] . "</h3>";
			$sql_user = $results[0]['username'];
			$sql_password = $results[0]['password'];
			$end++;
		};
	// Set username and password for checking (password encrypted to compare against the password in db)
		$password_verify = password_verify($_POST['pass'], $sql_password);
		$username = $_POST["user"];
	
	// If statement to check whether or not the login credentials are valid
		if ($username == $sql_user && $password_verify == true) {
			$_SESSION["username"] = $username;
			?>
			
			<script type="text/javascript">
				window.location.href = 'account_page.php';
			</script>
			
			<?php
			die;
		} else {
			?>
			
			<script type="text/javascript">
				alert("Incorrect Username/Password");
				window.location.href = 'index.php';
			</script>
			
			
			<?php
			exit;
		};
?>