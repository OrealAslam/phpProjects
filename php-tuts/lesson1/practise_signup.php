<!DOCTYPE html>
<html>
<head>
	<title>Practise Signup</title>
	<style type="text/css">
		#error, #success{text-transform: uppercase; letter-spacing: 2px; font-size: 22px; font-family: sans-serif;}
		fieldset{width: 175px;}
		#error{color: red;}
		#success{color: green;}
	</style>
</head>
<body>

	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
		<fieldset>
			<legend>Register Yourself</legend>
		<input type="text" name="username" placeholder="username"><br>
		<input type="password" name="passkey" placeholder="password"><br>
		<input type="text" name="email" placeholder="enter email"><br>
		<input type="submit" name="button" value="Signup">		
		</fieldset>
		
	</form>

</body>
</html>

<?php 
	if (isset($_POST['button'])) {

		include('practise_signup_functions.php');

		$status = input_recieve($_POST);

		if ($status === true) {

			$status = valid_sanitize_signup($_POST);

			if (is_array($status)) {

				include ('practise_signup_DB.php');

				$status =  signup($status);

				if ($status === true) {

					success("Signup");
					
					header("refresh:3 url=practise_signup.php ");
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