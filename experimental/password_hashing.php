<?php
/* MySQL for users table // reference only, not structure in production
	CREATE TABLE `users` (
	  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	  `fname` varchar(32) DEFAULT NULL,
	  `lname` varchar(64) DEFAULT NULL,
	  `uname` varchar(64) DEFAULT NULL,
	  `password` text DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE (`uname`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1;
*/

$null = "this is here to break up the green";

/* This all goes in "register_login.html"
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register / Login</title>
    <style type="text/css">
        .form {
            width: 30%;
        }
        input[type="text"], input[type="password"] {
            width: 99%;
            height: 1.5em;
            padding-bottom: 5px;
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
    <div class="form">
        <fieldset>
            <legend> REGISTER </legend>
            <form name="register" action="inc/php/register.php" method="post">
                <input name="fname" type="text" placeholder="please enter your first name"><br>
                <input name="lname" type="text" placeholder="please enter your last name"><br>
                <input name="uname" type="text" placeholder="please enter a user name"><br>
                <input name="upassword" type="password" placeholder="please enter a password or passphrase"><br>
                <input name="submit" type="submit">
            </form>
        </fieldset>
    </div>
    <div class="form">
        <fieldset>
            <legend> LOGIN </legend>
            <form name="login" action="inc/php/login.php" method="post">
                <input name="uname" type="text" placeholder="please enter your user name"><br>
                <input name="upassword" type="password" placeholder="please enter your password or passphrase"><br>
                <input name="submit" type="submit">
            </form>
        </fieldset>
    </div>
</body>
</html>
*/

/* ==============================================
 * this is where it gets real
 * ============================================== */
 
include 'inc/pdo_connect.php';

	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$username = $_POST['username'];
		$password = password_hast($_POST['password'], PASSWORD_DEFAULT);
		$email = $_POST['email'];
		
		$query = 'INSERT INTO `dkimot_user_info` (`name`, `surname`, `username`, `password`, `email`) VALUES (?,?,?,?,?)';
		
	};

?>