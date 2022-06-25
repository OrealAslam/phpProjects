	<?php 

	session_start();
		if (isset($_POST['login'])) {
			include('functions.php');
			$status = check_input($_POST);
			if ($status === true) {
				$status = validate_login($_POST);
				if (is_array($status)) {
					include('database.php');
					$status = authenticate_login($_POST);
					if (is_array($status)) {
						$_SESSION["loggedin"] = $status;
						header("Location: user_profile.php");	
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
		<title>Login</title>
	</head>
	<link href="https://fonts.googleapis.com/css2?family=Mukta&family=Nunito:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Peta&family=Mukta&family=Nanum+Gothic:wght@700&family=Noto+Sans+KR:wght@300&family=Nunito:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
		div#wrapper{width: 990px; height: 650px; margin: 0px; padding: 0px; box-sizing: border-box; position: relative;}
		div#login{width: 500px; height: 400px; border: 3px solid #ffee21; position: absolute; top: 50px; left: 350px; font-family: 'Mukta', sans-serif;}
		div#login h2{letter-spacing: 2px; text-transform: uppercase; text-align: center;}
		input[type="text"]{letter-spacing: 1px; width: 250px; margin-left: 130px; margin-bottom: 20px; font-size: 20px; padding-left: 20px; border: none; border-bottom: 2px solid black; outline: none;}
		input[type="password"]{letter-spacing: 1px; width: 250px; margin-left: 130px; margin-bottom: 20px; font-size: 20px; padding-left: 20px; border: none; border-bottom: 2px solid black; outline: none;}
		input[type="submit"]{letter-spacing: 2px; width: 150px; margin-left: 172px; margin-top: 10px; font-size: 20px; padding: 0px 3px; cursor: pointer; font-family: 'Mukta', sans-serif; height: 40px; outline: none; border: none;}
		input[type="submit"]:hover{ border: none; outline: 2px solid#0000b3;}


	</style>
	<body>
	<div id="wrapper">
		<div id="login">
			<h2>Login</h2>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="text" name="email" placeholder="Email *"><br>
				<input type="password" name="password" placeholder="Password *"><br>
				<input type="submit" name="login" value="Login"><br>
				
			</form>		
		</div>
	</div>
	</body>
	</html>