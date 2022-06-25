<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<title><?php echo TITLE; ?></title>
 	<!-- Bootstrap CSS -->
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
 	<!-- Font Awosome -->
 	<link rel="stylesheet" type="text/css" href="../css.all.min.css">
 	<!-- Custom CSS -->
 	<link rel="stylesheet" type="text/css" href="../css/custom.css">
 </head>
 <body>
 	<nav class="navbar navbar-dark bg-danger fixed-top flex-md-nowrap p-0 shadow-sm">
 		<a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-brand col-sm-3 col-md-2 mr0">OSMS</a> 	
 	</nav>

 	<!-- Container Start -->
	<div class="container-fluid" style="margin-top: 80px;">
		<div class="row"> <!--Start row-->
			<nav class="col-md-3 col-lg-2 col-sm-4 bg-light sidebar d-print-none"> <!-- Side bar -->
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item"><a href="dashboard.php" class="nav-link <?php if(PAGE == 'dashboard'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>

						<li class="nav-item"><a href="work.php" class="nav-link <?php if(PAGE == 'work'){echo 'active bg-danger text-white';} ?>"><i class="fab fa-accessible-icon mr-2 "></i>Work Order</a></li>

						<li class="nav-item"><a href="request.php" class="nav-link <?php if(PAGE == 'request'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-align-center mr-2"></i>Requests</a></li>

						<li class="nav-item"><a href="assets.php" class="nav-link <?php if(PAGE == 'assets'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-database mr-2"></i>Assets</a></li>

						<li class="nav-item"><a href="technician.php" class="nav-link <?php if(PAGE == 'technician'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-tools mr-2"></i>Technician</a></li>

						<li class="nav-item"><a href="requester.php" class="nav-link <?php if(PAGE == 'requester'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-users mr-2"></i>Requester</a></li>

						<li class="nav-item"><a href="soldproductrecord.php" class="nav-link <?php if(PAGE == 'soldproductrecord'){echo 'aactive bg-danger text-white';} ?> "><i class="fas fa-table mr-2"></i>Sell Report</a></li>

						<li class="nav-item"><a href="workreport.php" class="nav-link <?php if(PAGE == 'workreport'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-table mr-2"></i>Work Report</a></li>

						<li class="nav-item"><a href="chanagepassword.php" class="nav-link <?php if(PAGE == 'chanagepassword'){echo 'aactive bg-danger text-white';} ?>"><i class="fas fa-key mr-2"></i>Change Key</a></li>

						<li class="nav-item"><a href="../logout.php" class="nav-link text-primary"><i class="fas fa-sign-out-alt text-primary"></i>Logout</a></li>
					</ul>     
				</div>
			</nav> <!-- Side bar end-->