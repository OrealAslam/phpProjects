<?php 
session_start();

error_reporting(0);
if (!isset($_SESSION['USEREMAIL'])){
	$captcha_code = $_SESSION['USERCODE'];
	if (isset($_POST['userlogin'])){
		if(($_POST['useremail'] == '') || ($_POST['userpassword'] == '')){
			echo "<script>alert('Enter credentials');</script>";
		}
		if($_POST['captcha'] == ''){
			echo "<script>alert('Captcha required');</script>";
			die();
		}
		if ($_POST['captcha'] == $captcha_code){
			include '../config.php';

			$email = mysqli_real_escape_string($conn, $_POST['useremail']);
			$pass = mysqli_real_escape_string($conn, $_POST['userpassword']);

			$email = filter_var($_POST['useremail'], FILTER_VALIDATE_EMAIL);
			if(!$email){echo "<script>alert('Invalid email address');</script>";}else{
				$email = filter_var($_POST['useremail'], FILTER_SANITIZE_EMAIL);
				$sql = "SELECT id, username, email, password FROM users WHERE email = '".$email."' AND password = '".$pass."'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0){
					$data = $result->fetch_assoc();
					// Check if a user is blocked by admin or not ?
					$sql = "SELECT * FROM blockuser WHERE user_id = '".$data['id']."'";
					$r = $conn->query($sql);
					if($r->num_rows > 0){echo "<script>alert('Your account is restricted');</script>"; die();}
					if(isset($_POST['remenberme'])){
						$_SESSION['USEREMAIL'] = $email;
						$_SESSION['UID'] = $data['id'];
						$_SESSION['NAME'] = $data['username'];
						setcookie('useremail', $email, time() + 86400);
						setcookie('userpass', $pass, time() + 86400);
						echo "<script>window.location.href='profile.php'</script>";
						$update_status = "UPDATE users SET status = 1 WHERE id = '".$_SESSION['UID']."'";
						$result = $conn->query($update_status);
					}
					$_SESSION['USEREMAIL'] = $email;
					$_SESSION['UID'] = $data['id'];
					$_SESSION['NAME'] = $data['username'];
					echo "<script>window.location.href='profile.php'</script>";
					$update_status = "UPDATE users SET status = 1 WHERE id = '".$_SESSION['UID']."'";
						$result = $conn->query($update_status);
				}
				else{
					echo "<script>alert('Invalid username or password');</script>";
				}
			}
		}
		else{
			echo "<script>alert('Mismatched captcha');</script>";
		}
	}
}
else{
	echo "<script>window.location.href= 'http://localhost/FYProject/user/profile.php';</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

   <!-- Font Awsome icons -->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Custom CSS -->
   <link rel="stylesheet" type="text/css" href="../css/style.css">

 <title>Final, Project</title>
</head>
<body>

<!-- Login area start -->
<div class="container  login-form">
	<h4 class="text-center mb-3">Please Sign in</h4>
	<div class="row justify-content-center">
		<div class="col-md-5 col-sm-9 col-11">
			<form action="" method="POST">
				<div class="form-group">
					<label for="useremail" class="form-label">Email</label>
					<input type="email" id="useremail" class="form-control" name="useremail" placeholder="email address" value="<?php if(isset($_COOKIE['useremail'])){echo $_COOKIE['useremail'];} ?>" required>
				</div>

				<div class="form-group">
					<label for="userpassword" class="form-label">Enter Password</label>
					<input type="password" id="userpassword" autocomplete="off" class="form-control" name="userpassword" value="<?php if(isset($_COOKIE['userpass'])){echo $_COOKIE['userpass'];} ?>" placeholder="password" required>
					<small class="text-danger">never share your passwod with any one else</small>
				</div>

				<!-- captcha -->
				<div class="form-row mb-2">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="enter captcha" name="captcha">
				    </div>
				    <div class="col">
				      <img src="captcha.php" alt="captcha.png">
				    </div>
				</div>

				<!-- remenber me -->
				<div class="form-check mb-2">
				    <input class="form-check-input" type="checkbox" name="remenberme" id="remenberme">
				    <label class="form-check-label" for="remenberme">
				        Remember me
				    </label>
				</div>

				<button type="submit" name="userlogin" class="btn btn-primary">Login</button>
			</form>
			<a href="../index.php"><small class="text-primary">Create an new Account</small></a>
		</div>
	</div>
</div>
<!-- Login area end -->

</body>
<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    
</body>
</html>