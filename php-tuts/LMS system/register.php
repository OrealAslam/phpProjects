<!DOCTYPE html>
<html>
<head>
	<title>Registration system</title>
	<link rel="stylesheet" type="text/css" href="css//style.css">
</head>
<style type="text/css">
	#error, #success{width: 100%; font-family: sans-serif; font-size: 18px;}
	#error{color: red; font-weight: bold;}
	#success{color: green; font-weight: bold;}
</style>
<body>
	<div id="container">
		<div class="registration-area">
			<h1>Register Yourself</h1>
			<form method="POST" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
				
				<input type="text" name="fname" placeholder="enter first name" maxlength="20"><br>
				<input type="text" name="lname" placeholder="enter last name" maxlength="20"><br>
				<input type="email" name="email" placeholder="enter email" maxlength="50"><br>
				<input type="password" name="password" placeholder="enter password"><br>
				<input type="date" name="dob" placeholder="enter date of birth"><br>
				<input type="radio" name="gender" value="male">Male<br>
				<input type="radio" name="gender" value="female">Female<br>
				<input type="radio" name="gender" value="others">Other<br>
				<input type="submit" name="submit" value="Register"><br>
			</form>
			<a href="login.php">Already member student</a>
		</div>
	</div>
</body>
</html>

<?php 
if (isset($_POST['submit'])) {
	include ('functions.php');
	$status = check_inputs($_POST);
	if ($status === true){
		$status = input_validation($_POST);
		if (is_array($status)){
			include('database.php');
			$status = upload_info($_POST);

			if ($status === true){
				header("Location: upload_image.php");
			}
			else{
				error($status);
			}
		}
		else{
			error($status);
		}
	}
	else{
		error($status);
	}
	
}

?>