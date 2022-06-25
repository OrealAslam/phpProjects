<?php 

/*
Sanitization: Clean-up data
Validization: verify data
*/


?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
</head>
<body>
	<h4>Selt-validating Form</h4>
	<form method="POST" action="val&sant.php">
		<label>First-name:</label>
			<input type="text" name="firstname" placeholder="entername"><br><br>
		<label>Last-name:</label>
		<input type="text" name="lastname" placeholder="lastname"><br>
		<br>
		<label>Password:</label>
		<input type="Password" name="password" placeholder="password"><br><br>
		<label>Retype-password:</label>
		<input type="password" name="re-psw" placeholder="password"><br><br>
		<label>Email:</label>
		<input type="email" name="email" placeholder="abc@example.com"><br><br>
		<button type="submit" name="submit">
			Submit
	</button>

</form>

</body>
</html>