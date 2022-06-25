<?php 
session_start();
error_reporting(0);
if (!isset($_SESSION['ADMINEMAIL'])){
	$captcha_code = $_SESSION['ADMINCODE'];
	if (isset($_POST['adminlogin'])){
		if(($_POST['adminemail'] == '') || ($_POST['adminpassword'] == '')){
			echo "<script>alert('Enter credentials');</script>";
		}
		if($_POST['captcha'] == ''){
			echo "<script>alert('Captcha required');</script>";
			die();
		}
		if ($_POST['captcha'] == $captcha_code){
			include '../config.php';

			$email = mysqli_real_escape_string($conn, $_POST['adminemail']);
			$pass = mysqli_real_escape_string($conn, $_POST['adminpassword']);

			$email = filter_var($_POST['adminemail'], FILTER_VALIDATE_EMAIL);
			if(!$email){echo "<script>alert('Invalid email address');</script>";}else{
				$email = filter_var($_POST['adminemail'], FILTER_SANITIZE_EMAIL);
				$sql = "SELECT id, email, password FROM admin_details WHERE email = '".$email."' AND password = '".$pass."'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0){
					$data = $result->fetch_assoc();
					if(isset($_POST['remenberme'])){
						$_SESSION['ADMINEMAIL'] = $email;
						$_SESSION['AID'] = $data['id'];
						setcookie('adminemail', $email, time() + 86400);
						setcookie('adminpass', $pass, time() + 86400);
						echo "<script>window.location.href='dashboard.php'</script>";
					}
					$_SESSION['ADMINEMAIL'] = $email;
					$_SESSION['AID'] = $data['id'];
					echo "<script>window.location.href='dashboard.php'</script>";
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
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/dashboard.php';</script>";
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
<h2 class="d-block p-3 text-center text-light bg-danger admin">Admin Area</h2>
<div class="container mt-5">
	<h4 class="text-center mb-3 text-danger">Sign in with Admin Previlleges</h4>
	<div class="row justify-content-center">
		<div class="col-md-5 col-sm-9 col-11">
			<form action="" method="POST">
				<div class="form-group">
					<label for="adminemail" class="form-label">Email</label>
					<input type="email" id="adminemail" class="form-control" name="adminemail" placeholder="admin@email.com" value="<?php if(isset($_COOKIE['adminemail'])){echo $_COOKIE['adminemail'];} ?>" required>
				</div>

				<div class="form-group">
					<label for="adminpassword" class="form-label">Enter Password</label>
					<input type="password" id="adminpassword" autocomplete="off" class="form-control" name="adminpassword" value="<?php if(isset($_COOKIE['adminpass'])){echo $_COOKIE['adminpass'];} ?>" placeholder="password" required>
					<small class="text-danger">Never share your Credentials with any one else</small>
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

				<button type="submit" name="adminlogin" class="btn btn-primary">Login</button>
			</form>
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