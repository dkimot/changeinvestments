<?php
session_start();
include("inc/pdo_connect.php");
include("sql_session_vars.php");

	if ($_POST["pin"] == $pin) {
		$_SESSION["pin_verified"] = true;
		header("Location: account_page.php");
	} elseif ($pin == null) {
		$_SESSION["pin"] = $_POST["pin"];
		?>
		<div class="login_form">
		<p>Please type your Change PIN in one more time.</p>
		<form action="pin1.php" method="POST">
			<table>
				<tr>
					<th><label for="pin">PIN</label></th>
					<td><input type="password" id="pin" name="pin"/></td>
				</tr>
			</table>
			<input type="submit" value="Log-in" />
		</form>
	</div>
		
		<?php
	} else {
		?>
		
		<script type="text/javascript">
			alert("That's the incorrect pin, please try again.")
			window.location.href("account_page.php");
		</script>
		
		<?php
	};

?>