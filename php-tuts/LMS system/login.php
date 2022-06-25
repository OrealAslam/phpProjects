
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="css/signin-style.css">
</head>
<style type="text/css">
	#error, #success{font-family: sans-serif; font-size: 21px; letter-spacing: 1px; position: absolute; top: 380px; left: 500px;}
	#error{color: #640000; font-weight: bold;}
	#success{color: green; font-weight: bold;}
</style>
<body>
	<div id="container">
		<div class="login-area">
			<h1>Login</h1>
			<form method="POST" action ="<?php echo $_SERVER['PHP_SELF']; ?>" >
				<input type="email" name="email" placeholder="enter email" maxlength="50"><br>
				<input type="password" name="password" placeholder="enter password"><br>
				<input type="submit" name="login" value="Login">
				<!-- <a href="#">Forget Password</a> -->
			</form>
			
		</div>
	</div>
</body>
</html>

<?php 
session_start();
if (isset($_POST['login'])){
	include("functions.php");
	$status = check_inputs($_POST);
	if ($status === true){
		$status = validate_login_inputs($_POST);
		if (is_array($status)) {
			include('database.php');
			$status = get_info_from_DB($_POST);
			if (is_array($status)){
				$_SESSION["logged"] = $status;
				header("Location: home_page.php");
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