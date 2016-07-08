<?php

$pageTitle = "Home";
$section = "home";

include("inc/header.php"); ?>

	<div class="login_form">
		<form action="connectivity.php" method="POST">
			<table>
				<tr>
					<th><label for="user">Username</label></th>
					<td><input type="text" id="user" name="user"/></td>
				</tr>
				<tr>
					<th><label for="pass">Password</label></th>
					<td><input type="password" id="pass" name="pass"/></td>
				</tr>
			</table>
			<input type="submit" value="Log-in" />
		</form>
	</div>
	</br>
	<div class="create_account">
		<a href="create_account.php">New? Create your free account here!</a>
	</div>
	<!-- <a href="randomstring.php">link</a> -->
	<?php include("inc/footer.php"); ?>