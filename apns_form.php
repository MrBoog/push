<form action='apns.php' method='POST'>
token:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input size='100' name='token'/> <br/>
message:&nbsp;&nbsp;&nbsp;&nbsp;<input size'100' name='message' value='Apple Push Notification!'> <br/>
badge:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input size='10' name='badge' value='1'> <br/>
push mode:&nbsp;&nbsp;<select name='pushmode'>
		<option value='development'>Development</option>
		<option value='product'>Product</option>
	</select>
</br>
<input type='submit'>
</form>
