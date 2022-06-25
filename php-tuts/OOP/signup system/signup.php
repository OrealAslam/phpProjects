<!DOCTYPE html>
<html>
<head>
	<title>Signup System in OOP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h3>Register Yourself</h3>
	<form method="POST" action="signup.php">
		<label>First Name : </label><input type="text" name="fname" ><br>
		<label>Last Name : </label><input type="text" name="lname" ><br>
		<label>Email : </label><input type="text" name="email" ><br>
		<label>Password : </label><input type="password" name="password" ><br>
		<label>Date of birth : </label><input type="date" name="dob" ><br>
		<input type="radio" name="gender" value="male" >Male<br>
		<input type="radio" name="gender" value="female" >Female<br>
		<input type="radio" name="gender" value="Others" >Others<br>
		<input type="submit" name="signup" value="Register..!!">
	</form>
</body>
</html>

<!-- PHP code goes here -->
<?php 
	if (isset($_POST['signup'])) {
		include('classes.php');
		$obj = new Database;
		$obj->insert_data();
			
	}
?>
