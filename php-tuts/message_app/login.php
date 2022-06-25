<?php 
include_once 'config.php'; 

if (isset($_SESSION['ulogin'])){
	header("Location: account_page.php");
}
else{
	// creating class object
	$obj = new Db_connect();

	if (isset($_POST['login'])){
		$obj->login($_POST);
	}
}	
?>

<!DOCTYPE html>
<html>
<head>
<title>Login to App</title>

<!--link Bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<!-- link fontawsome -->
<link rel="stylesheet" type="text/css" href="css/all.min.css">

<!-- custom css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<!-- login form start -->

<!-- main container start -->
<div class="container mt-5">
	<center class="my-3"><h4>LOGIN <span class="text-danger">TO YOUR</span> ACCOUNT</h4></center>
	<div class="row justify-content-center shadow-lg py-4">

		<div class="col-md-10">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
				
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
				</div>

				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password" required>
				</div>

				<button type="submit" class="btn btn-primary mt-2" name="login">Login</button>
				<!-- displaying messages -->
				<span class="ml-4">
					<?php 
						if(isset($_GET['error']) AND $_GET['error'] == 'req'){
							echo "<span class='alert alert-warning' role='alert'>All fields required</span>";
						}

						if(isset($_GET['error']) AND $_GET['error'] == 'invalid_email'){
							echo "<span class='alert alert-danger' role='alert'>invalid email</span>";
						}

						if(isset($_GET['error']) AND $_GET['error'] == 'notpre'){
							echo "<span class='alert alert-info' role='alert'>stmt obj not prepared</span>";
						}

						if(isset($_GET['error']) AND $_GET['error'] == 'invalid_cre'){
							echo "<span class='alert alert-danger' role='alert'>invalid credentials</span>";
						}

						if(isset($_GET['success']) AND $_GET['success'] == 'login'){
							echo "<span class='alert alert-success' role='alert'>login successfully</span>";
						}
					?>
				</span>

				<!-- end displaying messages -->
			</form>
		</div>
	</div>
</div>


<!-- login form end -->

<!-- link Js files -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.min.js"></script>
</body>
</html>		