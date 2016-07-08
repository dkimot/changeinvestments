<?php

/*
 * For dev only!
 * Never EVER in production!
 * error_reporting(E_ALL);
 * ini_set('display_errors', 1);
 */

// define login information
	define('USER', 'dkimot_master');
	define('PASS', '_16dk1m0tO!');

// setting up dataQuery function
	function dataQuery($query,$params) {
		$queryType = explode(' ', $query);
	
		// establish database connection
		try {
			$dbh = new PDO('mysql:host=localhost;dbname=dkimot_user_info', USER, PASS);
			$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo $e->getMessage();
			$errorCode = $e->getCode();
		};
		
		// run query (check note below syntax guide)
		try {
			$queryResults = $dbh->prepare($query);
			$queryResults->execute($params);
			if ($queryResults != null) {
				$results = $queryResults->fetchAll(PDO::FETCH_ASSOC);
				return $results;
				} else {
					return $queryResults->rowCount();
				};
			} catch (PDOException $e) {
				$errorMsg = $e->getMessage();
				echo $errorMsg;
			};
		};
	
/* Syntax for dataQuery function
 * $query = // MySQL query
 * $params = array(''); // You must pass all values to bind an array to PDOStatement->execute(). More info at jayblanchard.net/demystifying_php_pdo.html
 * $results = dataQuery($query, $params);
 * // Now do what you want with $results
 */
 
/* NOTE:
 * Initially the if statement went ($queryResults !=null && 'SELECT' == $queryType[0])
 * This was edited to allow for queries beyond simple searches
 * If I was wrong to do this, please alert me
 * -Davis
 */
?>