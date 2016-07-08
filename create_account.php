<?php
session_start();
$pageTitle = "Create Accout | Change Investments";
include("inc/header.php");
$msg = "<div class=\"msg\">
		<p>Sorry, that username is taken. Please try a different username. Thank you for your patience!</p>
		</div>";
					
?>
<h1>Welcome to Change Investments!</h1>

	<div class="create_account">
		<form action="account_creation.php" method="POST">
			<table>
				<tr>
					<th><label for="user">Set your username</label></th>
					<td><input type="text" placeholder="Username" id="user" name="user" onkneyup="chckUserfun(this.value)"/></td>
				</tr>
				<?php
				
					if ($_SESSION["unique_user"] == false && $_SESSION["unique_user"] != NULL) {
						echo $msg;
						} else {};
				
				?>
				<tr>
					<th><label for="pass">Set your password</label></th>
					<td><input type="password" id="pass" name="pass"/></td>
				</tr>
				<tr>
					<th><label for="pass1">Confirm your password</label></th>
					<td><input type="password" id="pass1" name="pass1"/></td>
				</tr>
				<tr>
					<th><label for="email">Email address?</label></th>
					<td><input type="text" id="email" name="email"/></td>
				</tr>
			</table>
			<input type="submit" value="Create Account!" />
		</form>
	</div>
	</div>
<?php include("inc/footer.php");