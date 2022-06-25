<!DOCTYPE html>
<html>
<head>
	<title>Registration System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style type="text/css">
		fieldset{width: 170px;}
		#error{color: red;}
		#success{color: green;}
		#success, #error{letter-spacing: 2px; font-size: 25px; text-shadow: 11px;}

	</style>
</head>
<body>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<center>
		<fieldset>
		<legend>Registration</legend>
			<input type="text" name="fname" placeholder="username"><br>
			<input type="password" name="password" placeholder="password"><br>
			<input type="text" name="email" placeholder="enter email"><br>
			<input type="submit" name="Register" value="SignUp">
		</fieldset>
		</center>
	</form>

</body>
</html>

<?php 
if (isset($_POST['Register'])) {

	include ('signup_function.php');

	 $status = get_input($_POST);

	 if ($status === true) {

	 	$status = val_san($_POST);

	 	if (is_array($status)) {

	 		include ('database_function.php');

	 		$status = register($status);

	 		if ($status === true) {
	 			execute("signup");
	 		}
	 		else{
	 			failed($status);
	 		}
	 	}
	 	else{
	 		failed($status);
	 	}
	 }
	 else{

	 	failed($status);
	 }
}

?>