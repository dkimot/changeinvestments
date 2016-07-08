
<div class="create_account_form">
		<form action="https://www.changeinvestmentscorp.com/inc/account/account_creation1.php" method="POST">
		<?php $_SESSION['form'] = "bank"; ?>
		<p>Last step! You are almost there!</p>
			<table>
				<tr>
					<th><label for="bank">Who is your bank?</label></th>
					<td><div class="dropdown">
							<button class="dropbtn">Banks</button>
								<div class="dropdown-content">
									<input type="radio" value="America_First_CU">America First Credit Union<br>
									<input type="radio" value="Key_Bank">Key Bank<br>
									<a class="adrop" href="inc/account/bank_support.php">Don't see your bank? Click here!</a>
									<?php $_SESSION['bank_support'] = "add_bank"; ?>
								</div>
						</div>
					</td>
				</tr>
				<tr>
					<th><label for="bank_account_number">Bank Account Number?</label></th>
					<td><input type="text" placeholder="Account Number" id="bank_account_number" name="bank_account_number"/></td>
				</tr>
			</table>
			<input type="submit" value="Finish!" />
		</form>
	</div>
