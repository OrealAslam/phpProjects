<?php 
session_start();
define('TITLE', 'Admin Area');
include 'include/header.php';

if (!isset($_SESSION['admin'])){

	if (isset($_POST['login'])){

		if (($_POST['email'] == "") || ($_POST['password'] == "")){
			$msg = "<div class='text-center text-capitalize alert alert-warning' role='alert'>enter credentials<div>";
		}
		else{
			require '../connection.php';
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);

			$sql = "SELECT * FROM admin_login WHERE email = '".$email."' AND password = '".$password."' limit 1";
			$stmt = $conn->query($sql);

			if ($stmt->num_rows == 1){				
				$_SESSION['admin'] = $_POST;
				header("Location: admindashboard.php");
			}
			else{
				
				$msg = "<div class='text-center text-capitalize alert alert-danger' role='alert'>invalid credentials<div>";
			}
			

		}
	}
}
else{
	header("Location: admindashboard.php");
}

?>
<!-- Login area start -->

<!-- Login area start -->

<div class="container mt-5" style="background-color: #4d4dff;">	
	<div class="row justify-content-center align-items-between py-0">
		<!-- column 1 start -->

		<div class="col-sm-8 col-12 py-md-5 jumbotron shadow-lg mt-4">
			<h4 class="text-md-right text-center mt-md-n5 mt-n3" style="color:  #000099;">Admin Area</h4>
			<form method="POST" class="mb-n2" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				
				<div class="form-group">
					<label for="useremail"><i class="fas fa-envelope"></i> Email</label>
					<input type="email" class="form-control" name="email" id="useremail">
				</div>
				<div class="form-group">
					<label for="password"><i class="fas fa-key"></i> Password</label>
					<input type="password" class="form-control" name="password" id="password">
					<small>Don't share your credientials with anyone</small>
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