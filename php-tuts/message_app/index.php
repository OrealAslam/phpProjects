<?php 
include_once 'config.php';

if (isset($_SESSION['ulogin'])){
	header("location: account_page");
}
else{
	// Include DB connection file
	
	$obj = new Db_connect();

	if (isset($_POST['submit'])){
		
		$obj->insert($_POST, $_FILES);
		
	}
}	
?>

<!DOCTYPE html>
<html>
<head>
	<!-- link bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- link fontawsome -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Message Appliication</title>
</head>
<body>

<!-- In this page we will define the main parameters of UI/UX design -->


<!-- main container start -->
<div class="container mt-5">
	<center class="my-3"><h4>SIGN <span class="text-danger">UP</span> HERE</h4></center>
	<div class="row justify-content-center shadow-lg py-4">

		<div class="col-md-10">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Username</label>
					<input type="text" class="form-control" name="username" id="name" placeholder="Enter Username">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
				</div>

				<div class="form-group">
					<label for="pass">Password</label>
					<input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password" required>
					<small class="text-danger">Don't share your password with anyone else.</small>
				</div>

				<div class="mb-3 input-hover">
				  <label for="formFile" class="form-label">Upload Photo</label>
				  <input type="file" class="form-control" name="p_pic" id="formFile">
				</div>
				<button type="submit" class="btn btn-primary mt-2" name="submit">Sign Up</button>
				<!-- displaying messages -->
				<span class="ml-4">
					<?php 
						if(isset($_GET['error']) AND $_GET['error'] == 'req'){
							echo "<span class='alert alert-warning' role='alert'>All fields required</span>";
						}

						if(isset($_GET['error']) AND $_GET['error'] == 'notimg'){
							echo "<span class='alert alert-info' role='alert'>not an image file</span>";
						}

						if(isset($_GET['error']) AND $_GET['error'] == 'failedsignup'){
							echo "<span class='alert alert-warning' role='alert'>Email alerady exists</span>";
						}

						if(isset($_GET['error']) AND $_GET['error'] == 'stmtfail'){
							echo "<span class='alert alert-danger' role='alert'>Error while preparing statement obj</span>";
						}

						if(isset($_GET['error']) AND $_GET['error'] == 'invalid'){
							echo "<span class='alert alert-danger' role='alert'>invalid email</span>";
						}
					?>
				</span>

				<!-- end displaying messages -->
			</form>
		</div>
	</div>
</div>
<!-- main container end -->











<!-- link Js files -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>
