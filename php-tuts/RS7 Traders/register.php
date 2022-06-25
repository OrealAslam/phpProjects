<?php 
if (isset($_POST['register'])) {

	include ('functions.php');

	$status = check_input($_POST);

	if ($status === true) {

		$status = valid_sanitize_inputs($_POST);
		if (is_array($status)) {

			include('database.php');

			$status = register($_POST);

			if ($status === true) {

			 	success('register');
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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register Yourself</title>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
		/* Errors and Success messeges are designed firstly */
		#errors{text-transform: uppercase; font-family: 'Noto Sans JP', sans-serif; letter-spacing: 1px; color: #f00; font-weight: bold; margin-left: 850px; margin-top: 10; position: absolute; }
		#success{text-transform: uppercase; font-family: 'Noto Sans JP', sans-serif; letter-spacing: 1px; color: #339966; font-weight: bold; margin-left: 850px; margin-top: 10; position: absolute; }
		/*Errors and Success messeges desigining ends here*/
		*{margin: 0px; padding: 0px; box-sizing: border-box;}
		#wrapper{
			width: 1536px;
		 	height: 100vh; 
		 	position: relative;
		 	background-image: url('https://image.shutterstock.com/image-photo/signup-screen-blonde-girl-pad-600w-450488413.jpg');
		 	background-position: left center;
		 	background-repeat: no-repeat;
		 	background-size: 50% 87%;

		}
		#register{
			position: absolute;
			 left: 50%; 
			 top: 46px;
			 width: 450px;
			 height: 595px;
			 border: 1px solid black;
		}
		#register h1{
			text-align: center;
			margin-top: 30px;
		}
		#register form{
			position: absolute;
			top: 90px;
			left: 80px;
		}
		#register form .name{
			width: 200px;
			height: 30px;
			border: none;
			font-size: 18px;
			outline: none;
			margin-top: 20px;
			border-bottom: 2px solid black;
			margin-bottom: 20px;
		}
		#register form .email{
			width: 200px;
			height: 30px;
			border: none;
			font-size: 18px;
			outline: none;			
			border-bottom: 2px solid black;
			margin-bottom: 20px;
		}
		#register form .password{
			width: 200px;
			height: 30px;
			border: none;
			font-size: 18px;
			outline: none;			
			border-bottom: 2px solid black;
			margin-bottom: 20px;
			
		}
		#register form .btn{
			width: 130px;
			height: 30px;
			cursor: pointer;
			text-align: center;
			margin-left: 29px;
			border: none;
			font-size: 18px;
			margin-top: 20px;
			outline: none;			
			border-bottom: 2px solid #ff0000;
			background-color: #ffe6e6;
			margin-bottom: 20px;
			
		}
		#register form .btn:hover{
			background-color: white;
			border-bottom: 3px solid #ff0000;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="register">
			<h1>Register Yourself</h1>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="text" name="fullname" placeholder="Full Name *" class="name" maxlength="50"><br>
				<input type="text" name="email" placeholder="Email *" class="email" maxlength="50"><br>
				<input type="password" name="password" placeholder="Passkey *" class="password" maxlength="50"><br>
				<input type="submit" name="register" value="Register" class="btn"><br>
			</form>
		</div>
	</div>
</body>
</html>



