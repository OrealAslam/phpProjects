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

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	<title>  <?php echo TITLE; ?> </title>
</head>
<body>
	<!-- Top Navbar -->
	<nav class="navbar navbar-dark fixed-top bg-danger p-0 flex-md-nowrap shadow"><a href="RequesterProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-2">OSMS</a></nav>

	<!-- Container Start -->
	<div class="container-fluid" style="margin-top: 100px;">
		<div class="row"> <!--Start row-->
			<nav class="col-sm-3 col-md-3 col-lg-2  bg-light sidebar py-2 d-print-none"> <!-- Side bar -->
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item"><a href="RequesterProfile.php" class="nav-link <?php if(PAGE == 'RequesterProfile'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-user mr-2"></i>Profile</a></li>

						<li class="nav-item"><a href="SubmitRequest.php" class="nav-link <?php if(PAGE == 'SubmitRequest'){echo 'active bg-danger text-white';} ?>"><i class="fab fa-accessible-icon mr-2"></i>Submit Request</a></li>

						<li class="nav-item"><a href="Requesterservicestatus.php" class="nav-link <?php if(PAGE == 'Requesterservicestatus'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-align-center mr-2"></i>Service Status</a></li>

						<li class="nav-item"><a href="RequesterChangePassword.php" class="nav-link <?php if(PAGE == 'RequesterChangePassword'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-key mr-2"></i>Change Key</a></li>

						<li class="nav-item"><a href="../logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
					</ul>     
				</div>
			</nav> <!-- Side bar end-->

			
