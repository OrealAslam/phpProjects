<?php
session_start();

$match = $_SESSION['CODE'];

if (isset($_POST['submit'])){

	if($_POST['code'] == $_SESSION['CODE']){
		
		echo "Captcha Matched";
	}
	else{
		echo "mis matched";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Captcha Security Form</title>
</head>
<body>

	<div class="container my-5">
		<div class="row justify-content-center">
			<p class="text-center text-secondary" style="font-size: 26px; font-weight: bold;">Captcha Security Form</p>
			<div class="col-md-8">
				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label class="form-label">Username</label>
						<input type="text" class="form-control" name="name">
					</div>

					<div class="form-group">
						<label class="form-label">Email</label>
						<input type="email" class="form-control" name="email">
					</div>

					<div class="form-group">
						<label class="form-label">Password</label>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="row my-4">
						  <div class="col">
						    <input type="text" class="form-control" placeholder="Enter Captcha here" name="code">
						  </div>
						  <div class="col">
						   <img src="Captcha.php">
						  </div>
					</div>

					<input type="submit" class="btn btn-primary" name="submit" value="Submit Form">
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>