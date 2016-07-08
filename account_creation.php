<?php
session_start();
//include("mysql_connect.php");
include("inc/pdo_connect.php");
//continue work from http://code.tutsplus.com/tutorials/how-to-code-a-signup-form-with-email-confirmation--net-6860

// Set arrays to check that required fields are filled in

	$action = array();
	$action['result'] = null;
	
	$text = array();

// Set variables for sql insertion (not injection)
	$username = $_POST['user'];
	if(empty($_POST['pass'])) {
		$action['result'] = 'p_error';
		array_push($text, 'You forgot your password!');
	} else {};
	$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$email = $_POST['email'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];

// Check that required fields are filled in

	if(empty($username)) {
		$action['result'] = 'u_error';
		array_push($text,'You forgot your username!');
	} else {};
	if(empty($email)) {
		$action['result'] = 'e_error';
		array_push($text,'You forgot your email!');
	} else {};
	
   /* 
	// Troubleshooting
		$query = "SHOW TABLES;";
		$params = array();
		$results = dataQuery($query, $params);
		var_dump($results);
	*/
	
	//var_dump($password);
	//var_dump($action);
	//echo "</br>";
	//var_dump($text);

	if($action['result'] != 'p_error' OR 'u_error' OR 'e_error') {
		//no errors, continue signup
	} else {
		echo $text;
		exit;
	};

	$action['text'] = $text;

// Check that it is a unique username
	$query = "SELECT * FROM `registered_users` WHERE `username` = ?;";
	$params = array($username);
	$results1 = dataQuery($query, $params);
	
	$query = "SELECT * FROM `temp_users` WHERE `username` = ?;";
	$params = array($username);
	$results2 = dataQuery($query, $params);

		/*
		 * // Troubleshooting
		 *	var_dump($results);
		 *	echo count($results);
		 *	exit;
		 */

	if ((count($results1) + count($results2)) > 0) {
		$_SESSION["unique_user"] = false;
		?>
		
		<script type="text/javascript">
		alert("That username already exists! Please try again.")
		window.location.href = 'create_account.php';
		</script>
		
		<?php
		exit;
	} else {};
	
// Random confirmation code
	$confirm_key = md5(uniqid(rand));

// Add to the temporary users database
	$query = "INSERT INTO `temp_users` (`username`, `password`, `email`, `confirm_key`) VALUES (?, ?, ?, ?);";
	$params = array($username, $password, $email, $confirm_key);
	$results = dataQuery($query, $params);
	
// Get user id for confirmation
	$query = "SELECT `id` FROM `temp_users` WHERE `username` = ?";
	$params = array($username);
	$results = dataQuery($query, $params);
	
// Test data insertion
	$query = "SELECT * FROM `temp_users` WHERE `username` = ?;";
	$params = array($username);
	$results = dataQuery($query, $params);
	
// If successfully inserted data into database, send confirmation link to email
	if (count($results) > 0) {
		//----------SEND MAIL FORM----------\\
		// Send email to...
			$to = $email;
		
		// Subject line
			$subject = "Here's the confirmation link for your Change Account";
		
		// From
			$header = "from: Change Investments davis.kimoto@gmail.com";
		
		// Message
			$message = "Your confirmation link:";
			$message .= "Click on this link to activate your account: ";
			$message .= "https://www.changeinvestmentscorp.com/confirmation.php?passkey=$confirm_key";
			
		// Send email
			$sentmail = mail($to,$subject,$message,$header);
	} else {
		echo "<div class=\"confirm_code_failure\">
				<p>We're having technical trouble and your code can't be sent right now. If you would like, contact tech support <a href=\"customersupport.php\">here</a>. Thank you for your patience.</p>
			  </div>";
		};

?>