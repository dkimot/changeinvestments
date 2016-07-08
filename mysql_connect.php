<?php

$db_host = "localhost";
$dsn = 'mysql:host=localhost;dbname=dkimot_user_info';
$db_username = "dkimot_master";
$db_pass = "_16dk1m0tO!";
//dsn doesn't require db_name variable, used for old method
//$db_name = "user_info";
$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

/*
//Old connection code below
//run mysql connection

	$conn = @mysql_connect("$db_host","$db_username","$db_pass") or die ("Connection to MySQL failed.");

//connect to db

	$conn_db = @mysql_select_db("$db_name") or die ("Database connection failed.");

	echo "Connection to MySQL and Database was successful.";
*/

//setup PDO
	try {
		//echo "Connection to MySQL server was successful.</br>";
		$db_user_info = new PDO($dsn, $db_username, $db_pass, $options);
		$db_user_info->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//var_dump($db_user_info);
	} catch (Exception $e) {
		echo "Connection to MySQL server failed.</br>";
		echo $e->getMessage();
		exit;
	};
	/*
	//Example syntax
	try {
		$results = $db_user_info->query("SELECT * FROM user_info WHERE id=1");
		echo "Retrieved results.";
	} catch (Exception $e) {
		echo "query failure";
		exit;
	};
	
	var_dump($results->fetchAll(PDO::FETCH_ASSOC));
	*/
	
?>