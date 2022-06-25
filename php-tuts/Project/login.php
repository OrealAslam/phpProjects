<!DOCTYPE html>
<html>
<head>
	<title>logged_in</title>
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;300;500&family=Playfair+Display&display=swap" rel="stylesheet">
	<style type="text/css">
		
		input[type = "email"]{width: 200px; padding:0px 20px; font-size: 18px; font-family: 'Playfair Display', serif; outline: none; border: none; border-bottom: 1px solid black; margin-bottom: 10px;}
		input[type = "password"]{width: 200px; padding:0px 20px; font-size: 18px; font-family: 'Playfair Display', serif; outline: none; border: none; border-bottom: 1px solid black; margin-bottom: 10px;}
		input[type = "submit"]{width: 150px; margin-top: 20px;border: none; cursor: pointer; height: 40px; outline: none; font-size: 24px; font-family: 'Playfair Display', serif; letter-spacing: 1px;}
		input[type = "submit"]:hover{background-color: black; color: white; border-radius: 10px; font-family: 'Playfair Display', serif; letter-spacing: 2px;}
		h1{font-family: 'Playfair Display', serif; font-size: 34px; text-align: center; letter-spacing: 2PX; margin-top: 150px;}
		form{text-align: center; font-family: 'Playfair Display', serif;}
		#success, #error{font-family: 'Playfair Display', serif; font-size: 18px; text-transform: uppercase; font-weight: bold;}
		#success{color: #00ff00;}
		#error{color: #ff0000;}
	</style>
</head>
<body>

	<h1>Login</h1>
	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		<input type="email" name="email" placeholder="email"><br>
		<input type="password" name="password" placeholder="password"><br>
		<input type="submit" name="login" value="Login"><br>
	</form>
	


</body>
</html>

<?php 
session_start();
	if (isset($_POST["login"])) {
		include('functions.php');
		$status = check_input($_POST);
		if ($status === true) {
			$status = valid_inputs_login($_POST);
			if (is_array($status)) {
				include ('database.php');
				$status = authenticate($_POST);
				if (is_array($status)) {
					$_SESSION["login"] = $status;
					header("Location: profile_page.php");
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