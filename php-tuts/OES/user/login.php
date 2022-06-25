<?php 
session_start();
define('TITLE', 'Login to your Account');
if (!isset($_SESSION['userlogin'])){

	include 'include/header.php';

	if (isset($_POST['login'])){

		// include db file

		require '../connection.php';

		$email = trim(mysqli_real_escape_string($conn, $_POST['useremail']));
		$password = trim(mysqli_real_escape_string($conn, $_POST['userpassword']));
	// checking missing input fields

		if(($_POST['useremail'] == "") || ($_POST['userpassword'] == "")){

			 $msg = "<div class='text-center text-capitalize alert alert-warning' role='alert'>All fields required<div>";
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){

			 	$msg = "<div class='text-center text-capitalize alert alert-warning' role='alert'>Invalid Email<div>";
		}

		// login part goes here

		else{
			$email = filter_var($_POST['useremail'], FILTER_VALIDATE_EMAIL);
			$email = filter_var($_POST['useremail'], FILTER_SANITIZE_EMAIL);

			$sql = "SELECT email, password FROM user_login WHERE email = ?";

			$stmt = $conn->prepare($sql);
			
			if ($stmt){
				$stmt->bind_param('s',$email);
				$stmt->bind_result($db_email, $db_password);
				$stmt->execute();
				$stmt->fetch();
				
				if ((!empty($db_email)) || (!empty($db_password))){
					if (password_verify($password, $db_password)){
						if(isset($_POST['rememberme'])){
							setcookie("email", $email, time() + 86400);
							$_SESSION['userlogin'] = $_POST;
							echo "<script>location.href='userdashboard.php'</script>";
						}
						else{
							$_SESSION['userlogin'] = $_POST;
							echo "<script>location.href='userdashboard.php'</script>";
						}
					}
					else{
						$msg = "<div class='text-center text-capitalize alert alert-danger' role='alert'>invalid credentials<div>";
					}
				}
				else{
					$msg = "<div class='text-center text-capitalize alert alert-danger' role='alert'>invalid credentials<div>";
				}
			}
		}	
	}
}
else{

	echo "<script>location.href='userdashboard.php'</script>";
}
?>

<!-- Login area start -->

<div class="container mt-5" style="background-color: #4d4dff;">	
	<div class="row justify-content-center align-items-between py-0">
		<!-- column 1 start -->

		<div class="col-md-6 col-12 jumbotron shadow-lg mt-4">
			<h4 class="text-right mt-n5" style="color:  #000099;">Login</h4>
			<form method="POST" class="mb-n2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				
				<div class="form-group">
					<label for="useremail"><i class="fas fa-envelope"></i> Email</label>
					<input type="email" class="form-control" name="useremail" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>" id="useremail">
				</div>
				<div class="form-group">
					<label for="password"><i class="fas fa-key"></i> Password</label>
					<input type="password" class="form-control" name="userpassword" id="password">
				</div>	

				<div class="form-group">
					<input type="checkbox" class="mr-2" name="rememberme" checked>Remember me
				</div>

				<button type="submit" class="btn btn-outline-primary float-right mt-5" name="login">Login</button>
			
			<!-- error or div -->
			<div class="d-flex">
				<div><?php if(isset($msg)){echo $msg;} ?></div>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- login area end -->

<!-- footer included -->
<?php
include 'include/footer.php';
?>