
<div class="create_account_form">
		<form action="https://www.changeinvestmentscorp.com/inc/account/account_creation1.php" method="POST">
		<?php $_SESSION['form'] = "identity"; ?>
			<table>
				<tr>
					<th><label for="day" class="datefield_label">Date of Birth</label></th>
					<td>
						<div class="datefield">
							<input id="day" type="tel" maxlength="2" placeholder="DD"/> / 
							<input id="month" type="tel" maxlength="2" placeholder="MM"/> / 
							<input id="year" type="tel" maxlength="2" placeholder="YY"/>
						</div>
					</td>
				</tr>
				<tr>
					<th><label for="ssn">Social Security Number</label></th>
					<td><input type="text" placeholder="SSN" maxlength="9" id="ssn" name="ssn"/></td>
				</tr>
				<?php $_SESSION['gender'] = NULL; ?>
			</table>
			<input type="submit" value="Next" />
		</form>
	</div>
