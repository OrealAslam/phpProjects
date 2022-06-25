<?php 
/*

Login the user to its account
if user is already LOGIN then session function redirect the user to profile page otherwise user will redirect to this login page

Adding a Captcha Security Layer
*/


session_start(); //starting session
if (isset($_SESSION['login'])){
	echo"<script>location.href='RequesterProfile.php';</script>";
}
else{

	if (isset($_REQUEST['rLogin'])){  // Checking button is pressed
		// Checking input fileds
		if (($_REQUEST['rEmail'] =="") || ($_REQUEST['rPassword'] =="")){
			$regmsg = '<div class="alert alert-warning mt-3 mb-0">All Fields Required</div>';
		}
		if(($_REQUEST['code'] =="")){
			exit($regmsg = '<div class="alert alert-warning mt-3 mb-0">Captcha Required!!!</div>');
		}
		if($_REQUEST['code'] !== $_REQUEST['captcha']){
			exit($regmsg = '<div class="alert alert-warning mt-3 mb-0">ohh!! mismatched captcha</div>');
		}

		include('../db_connection.php');
		$email = $_REQUEST['rEmail'];
		$password = $_REQUEST['rPassword'];

		$sql = "SELECT `r_email`, `r_password`FROM `requesterlogin_tb` WHERE `r_email`='".$email."' AND `r_password`='".$password."' limit 1";
		$result = $conn->query($sql);
		if ($result->num_rows == 1){ 
			if (isset($_POST['rememberme'])){
				// save username in cookie
				$_SESSION['login'] = $_REQUEST;
				setcookie('useremail', $_POST['rEmail'], time() + 86400);
				// save password in cookie
				setcookie('userpassword', $_POST['rPassword'], time() + 86400);
				echo"<script>location.href='RequesterProfile.php';</script>";
			}
			else{
				$_SESSION['login'] = $_REQUEST;
				echo"<script>location.href='RequesterProfile.php';</script>";
			}
			// $_SESSION['login'] = $_REQUEST;
			// $_SESSION['is_login'] = $_REQUEST;
			// echo"<script>location.href='RequesterProfile.php';</script>";
		}
		else{
			$regmsg = '<div class="alert alert-warning mt-3 mb-0">Invalid username or password</div>';
		}
	}
}


// captcha function
function captcha(){
	$captcha = mt_rand(11111, 99999);
	echo $captcha;
	return $captcha;
}

function check(){
	if(!empty($_POST['code'])){
		$captcha_code = $_POST['code'];
		if ($captcha_code !== captcha()){
			$regmsg = '<div class="alert alert-warning mt-3 mb-0">Invalid Captcha code!!</div>';
		}
	}
	return false;
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!-- Font Awosome -->
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<title>Login</title>
</head>
<body>
	<div class="mb-3 mt-3 text-center" style="font-size: 30px;">
		<i class="fas fa-stethoscope"></i>
		<span>Online Service Management System</span>
	</div>
	<div class="text-center mb-5">
		<p style="font-size:20px;"><i class="fas fa-user-secret text-danger"></i>Requester Area</p>
	</div>
	

	<!-- Login Form -->
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-sm-6 col-md-4">
				<form method="POST" action="" class="shadow-lg p-4">
					<div class="form-group">
						<i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" name="rEmail" class="form-control" placeholder="Email" value="<?php if(isset($_COOKIE['useremail'])){echo $_COOKIE['useremail'];} ?>">
						<small>We'll never share your email with anyone else.</small>
					</div>	

					<div class="form-group">
						<i class="fas fa-key"></i><label for="password" class="font-weight-bold pl-2">Password</label><input type="password" name="rPassword" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE['userpassword'])){echo $_COOKIE['userpassword'];} ?>">
					</div>

						<!--Captcha Div  -->
					<label>Enter Captcha</label>
					<div class="form-row">
						<div class="col-md-4 form-group">
						<input type="text" class="form-control" name="captcha" value="<?php captcha();?>"readonly>						
						</div>
						<div class="col-md-4 form-group">
						<input type="text" class="form-control" name="code" placeholder="captcha">	
						</div>
					</div>
					
					<div class="form-group">
					<input type="checkbox" class="mr-2" name="rememberme">Remember me
					</div>

					<button type="submit" name="rLogin" class="btn btn-outline-danger font-weight-bold btn-block mt-3 shadow-sm">Login</button>	
					<?php if(isset($regmsg)){echo $regmsg;} ?>	
				</form>			
				<div class="text-center"><a href="../index.php" class="btn btn-outline-info shadow-sm font-weight-bold mt-3">Back to Home</a></div>
			</div>
		</div>
	</div>


<!-- Javascript Files -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>
</html>