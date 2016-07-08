
<div class="create_account_form">
		<form action="https://www.changeinvestmentscorp.com/inc/account/account_creation1.php" method="POST">
		<?php $_SESSION['form'] = "name"; ?>
		<p>There are just a few more things we need to check before you can start changing lives and making loans. Don't worry, it's quick and easy.</p>
			<table>
				<tr>
					<th><label for="name">What's your first name?</label></th>
					<td><input type="text" placeholder="First Name" id="name" name="name"/></td>
				</tr>
				<tr>
					<th><label for="mi">Middle Initial?</label></th>
					<td><input type="text" placeholder="MI" id="mi" name="mi"/></td>
				</tr>
				<tr>
					<th><label for="surname">How about your last name?</label></th>
					<td><input type="text" placeholder="Last Name" id="surname" name="surname"/></td>
				</tr>
				<tr>
					<th><label for="title">Is there a title you want?</label></th>
					<td><input type="text" placeholder="Title" id="title" name="title"/></td>
				</tr>
			</table>
			<input type="submit" value="Next" />
		</form>
	</div>
