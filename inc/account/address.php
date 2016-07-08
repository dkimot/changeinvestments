
<div class="create_account_form">
		<form action="https://www.changeinvestmentscorp.com/inc/account/account_creation1.php" method="POST">
		<?php $_SESSION['form'] = "address"; ?>
			<table>
				<tr>
					<th><label for="address">What's your street address?</label></th>
					<td><input type="text" placeholder="Street Address" id="address" name="address"/></td>
				</tr>
				<tr>
					<th><label for="city">City?</label></th>
					<td><input type="text" placeholder="City" id="city" name="city"/></td>
				</tr>
				<tr>
					<th><label for="state">State?</label></th>
					<td><input type="text" id="state" name="state" maxlength="2"</td>
				</tr>
				<tr>
					<th><label for="zip">Zip Code?</label></th>
					<td><input type="text" placeholder="Zip Code" id="zip" name="zip"/></td>
				</tr>
			</table>
			<input type="submit" value="Next" />
		</form>
	</div>