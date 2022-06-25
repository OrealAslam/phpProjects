<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<!-- Font Awesome CSS -->
	<link rel="stylesheet" type="text/css" href="css/all.min.css">

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
		<!-- Custom CSS (self styling sheet)-->
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<title>OSMS</title>
</head>
<body>
<!-- Start Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-danger pl-4 fixed-top">
		<a href="index.php" class="navbar-brand">OSMS</a>
		<span class=" navbar-text px-3">Customer's Happiness is our Aim</span>

		<button  type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="myMenu">
			<ul class="navbar-nav custom-nav px-5">
				<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
				<li class="nav-item"><a href="#registeration" class="nav-link">Registeration</a></li>
				<li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
				<li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
			</ul>			
		</div>

	</nav> <!--Ending nav-bar -->

<!-- Start Header Jumbotron -->
	<header class="jumbotron back-image mb-5" style="background-image: url('images/banner-1.jpg');">
		<div class="myclass mainHeading">
			<h3 class="text-danger text-uppercase font-weight-bold">Welcome to OSMS</h3>
			<p class="font-italic font-weight-bold text-dark">Customer's Haappiness is our Aim</p>
			<a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
			<a href="#registeration" class="btn btn-danger mr-4">Sign Up</a>
		</div>		
	</header><!--Jumbotron ends here-->

<!-- Start Introduction Section -->
	<div class="container">
		<div class="jumbotron">
			<h3 class="text-center"><span class="text-secondary text-uppercase">OSms</span> Services</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat.</p>
		</div>
	</div><!-- End Introduction Section + Container -->

	<!-- Service section start from here -->

	<div class="container text-center border-bottom" id="Services">
		<h2>Our Services</h2>
		<div class="row mt-4">
			<div class="col-md-4 mb-4">
				<a href="#" class="text-success"><i class="fas fa-tv fa-8x"></i></a>
				<h4 class="mt-4">Electronic Appliences</h4>
			</div>
			<div class="col-md-4 mb-4">
				<a href="#" class="text-primary"><i class="fas fa-sliders-h  fa-8x"></i></a>
				<h4 class="mt-4">Preventive Maintenance</h4>
			</div>
			<div class="col-md-4 mb-4">
				<a href="#" class="text-secondary"><i class="fas fa-cogs fa-8x"></i></a>
				<h4 class="mt-4">Fault Repair</h4>
			</div>
		</div>
	</div><!-- Service section ends here Container -->	

<!-- Start Registration From -->
	<?php include ('registeration_form.php'); ?>
	<!--Registration From container ends here -->

<!-- Start Happy Customer -->
	<div class="jumbotron bg-danger p-3">
		<div class="container">
			<h3 class="text-center text-white mb-4">Happy Customers</h3>
			<div class="row">
				<div class="col-lg-3 col-sm-6 col-12">
					<div class="card shadow-lg mb-3">
						<div class="card-body text-center">
							<img src="images/avatar-2.jpg" style="width: 170px; border-radius: 50%; max-height: 160px;" class="img-fluid">
							<h4 class="card-title ">John Doe</h4>
							<p class="card-text">He is our client ,he is very gentle and kind hearted and believe on us</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-12">
					<div class="card shadow-lg mb-3">
						<div class="card-body text-center">
							<img src="images/avatar-2.jpg" style="width: 170px; border-radius: 50%; max-height: 160px;" class="img-fluid">
							<h4 class="card-title ">Rahul Kumar</h4>
							<p class="card-text">He is our client ,he is very gentle and kind hearted and believe on us</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-12">
					<div class="card shadow-lg mb-3">
						<div class="card-body text-center">
							<img src="images/avatar-3.jpg" style="width: 170px; border-radius: 50%; height: 160px;" class="img-fluid">
							<h4 class="card-title ">Jyoti Sinha</h4>
							<p class="card-text">He is our client ,he is very gentle and kind hearted and believe on us</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 col-12">
					<div class="card shadow-lg mb-2">
						<div class="card-body text-center">
							<img src="images/avatar-4.jpg" style="width: 170px; border-radius: 50%; max-height: 160px;" class="img-fluid">
							<h4 class="card-title ">Alexa clark</h4>
							<p class="card-text">He is our client ,he is very gentle and kind hearted and believe on us</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Happy Customer container ends here -->

	<!-- Contact Area-->

	<div class="container" id="Contact"><!--Contact area starts here -->
		<h2 class="text-center mt-3 mb-4">Contact Us</h2>
		<div class="row">
			<!--Contact form starts here -->
			<?php include ('contact_form.php'); ?>			
			 <!-- Contact form end here -->			

			<div class="col-md-4"><!-- company info column start-->
				<strong>Headquarters:</strong><br>
				OSMS Pvt, Ltd<br>
				Lahore, Pakistan<br>
				Johar Town 33707<br>
				Phone +92311234567<br>
				<a href="#" target="_blank" class="text-info text-decoration-none">www.osms.edu.com.pk</a><br>
				<br><br>

				<strong>Branch:</strong><br>
				OSMS Pvt, Ltd<br>
				Karachi, Pakistan<br>
				Clifton 87105<br>
				Phone +9212345567<br>
				<a href="#" target="_blank" class="text-info text-decoration-none">www.osms.edu.com.pk</a><br>

			</div><!-- company info column ends here-->

		</div>
	</div><!--Contact area ends here -->

	<!-- Footer starts here -->

	<footer class="container-fluid bg-dark mt-5">
		<div class="container">
			<div class="container">
				<div class="row py-2">
					<div class="col-md-6">
						<span class="text-white pr-2">Follow Us:</span>
						<a href="#" class="pr-2 text-danger"><i class="fab fa-facebook-f"></i></a>
						<a href="#" class="pr-2 text-danger"><i class="fab fa-whatsapp"></i></a>
						<a href="#" class="pr-2 text-danger"><i class="fab fa-twitter"></i></a>
						<a href="#" class="pr-2 text-danger"><i class="fab fa-instagram"></i></a>
					</div>

					<div class="col-md-6">
						<small class="text-white text-right">Designed by Oreal Aslam</small> 
						<small><a href="Admin/adminlogin.php" class="text-decoration-none">Admin Login</a></small>
					</div>
				</div>
			</div>
		</div>
	</footer>
	

<!-- Javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>