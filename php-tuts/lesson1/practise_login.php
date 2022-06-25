<!DOCTYPE html>
<html>
<head>
	<title>Practise Signup</title>
	<style type="text/css">
		#error, #success{text-transform: uppercase; letter-spacing: 1px; font-size: 22px; font-family: sans-serif;}
		fieldset{width: 175px;}
		#error{color: red; font-size: bold;}
		#success{color: green;}
	</style>
</head>
<body>

	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
		<fieldset>
			<legend>Login</legend>
				<input type="text" name="email" placeholder="enter email"><br>
				<input type="password" name="passkey" placeholder="password"><br>
				<input type="submit" name="button" value="Login">		
		</fieldset>
		
	</form>

</body>
</html>

<?php 

session_start();
	if (isset($_POST['button'])) {

		include('practise_signup_functions.php');

		$status = input_recieve($_POST);

		if ($status === true) {

			$status = valid_sanitize_login($_POST);


			if (is_array($status)) {

				include ('practise_signup_DB.php');

				$status =  authenticate($status);

				if (is_array($status)) {

					$_SESSION["login"] = $status;
					header("Location: practise_profile.php.php");				
					
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