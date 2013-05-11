<?php


?>

<form action="/create-invoice.php" method="post">
	<table>
		<tr>
			<td>Title</td>
			<td><input type="text" name="sTitle" id="sTitle"/></td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				<select name="eStatus" id="eStatus">
					<option value="Design">Design</option>
					<option value="Due">Due</option>
					<option value="Paid">Paid</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Amount</td>
			<td><input type="number" name="fAmount" id="fAmount"/></td>
		</tr>
		<tr>
			<td>Due Date</td>
			<td><input type="date" name="dDue" id="dDue"/></td>
		</tr>
		<tr>
			<td>Send Date</td>
			<td><input type="date" name="dToSend" id="dToSend"/></td>
		</tr>
		<tr>
			<td>Pre-Paid Amount</td>
			<td><input type="number" name="fAmountRemaining" id="fAmountRemaining"/></td>
		</tr>
	</table>
	<input type="submit">
</form>