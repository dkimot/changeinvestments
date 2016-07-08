<!DOCTYPE html>
<html>
<head>
	<title>Page Title</title>
</head>
<body>

<?php
	function getRandomString($length = 40, $charset = 'alphanumspecial') {
		$num = '0123456789';
		$alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUV';
		$special = '!@#$%^&*()-_=+`~[{}]\/|*+..,<>?';
		switch ($charset) {
			case 'alpha':
				$chars = $alpha;
				break;
			case 'num';
				$chars = $num;
				break;
			case 'alphanum';
				$chars = $alpha . $num;
				break;
			case 'alphanumspecial';
				$chars = $alpha . $num . $special;
				break;
		}
		
		$randstring='';
		$maxvalue=strlen($chars)-1;
		for ($i = 0; $i < $length; $i++)
			$randstring .= substr($chars, rand(0, $maxvalue), 1);
		return $randstring;
	}
	
	echo getRandomString();
	
?>

</body>
</html>
