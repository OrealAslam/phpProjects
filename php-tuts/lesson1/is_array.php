<!DOCTYPE html>
<html>
<head>
	<title>Is_Array Function</title>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">	
	<style type="text/css">
		fieldset{width: 200px;}
		#error{color: red;}
		#success{color: green;}
		#error,#success{font-size: 19px; font-weight: bold; font-family: sans-serif;}
	
	</style>
</head>
<body>
	<center>
		<form action="is_array.php" method="POST">
	<fieldset>
		<legend>Register Yourself</legend>
	<span class="fa fa-user"></span> <input type="text" name="fname" placeholder="username" maxlength="25"><br>
	<span class="fa fa-unlock-alt"></span> <input type="password" name="password" placeholder="password" maxlength="50"><br>
	<span class="fa fa-envelope"></span><input type="text" name="email" placeholder="email" maxlength="40"><br>
	<input type="submit" name="submit" value="Submit" style="border: none; padding: 7px 35px; font-family: sans-serif; font-size: 18px; margin-top: 20px; ">
	</fieldset>

</form>
	</center>

</body>
</html>
<?php 
if (isset($_POST['submit'])) {

	include('is_array_submit.php');

	 $status = input_recieved ($_POST);

	if ($status === true) {

	 	$status = validate_sanitize($_POST);

	 	if (is_array($status)) {
	 		// DB code goes here
	 		include('database.php');
	 		$status = signup ($status);

	 		if ($status === true) {
	 			success($status);
	 		}
	 		else{
	 			errors($status);
	 		}

	 	}
	 	else{
	 		errors($status);
	 	}
	 }
	 else{
	 	errors($status);
	 }
}
?>