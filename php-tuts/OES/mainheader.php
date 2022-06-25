<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- Font Awsome CSS -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

	<!-- Style Sheet CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Online Education System</title>
</head>
<body>

<!-- Navbar start-->

<div class="container-fluid py-4">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark pl-5 fixed-top">
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-brand mr-5">Educate Me</a>
		<span class="navbar-text mr-5">Education is soul of body</span>

		<!-- lined button -->

		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu"><span class="navbar-toggler-icon"></span></button>

		<!-- actual  nav start -->
		<div class="collapse navbar-collapse" id="myMenu">
			<ul class="navbar-nav ml-auto mr-5">
				<li class="nav=item">
					<a href="index.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="courses.php" class="nav-link">Courses</a>
				</li>
				<li class="nav-item">
					<a href="user/register.php" class="nav-link">Register</a>
				</li>
				<li class="nav=item">
					<a href="user/login.php" class="nav-link">Login</a>
				</li>
				<li class="nav-item">
					<a href="about.php" class="nav-link">About</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">FAQ's</a>
				</li>
			</ul>
		</div>
		<!-- actual  nav end -->
	</nav>
</div>
<!-- Navbar end-->