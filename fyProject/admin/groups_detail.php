<?php 
session_start();
error_reporting(0);
if (!isset($_SESSION['ADMINEMAIL'])){
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}
include_once '../config.php';
?>

<!-- main DASHBOARD code start -->
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

 <title>Admin Area</title>
</head>
<body>

<nav class="navbar navbar-light bg-danger">
  <a class="navbar-brand text-light admin-brand">Social Media</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

<!-- Container Start -->
<div class="container-fluid">
	<div class="row my-2"> <!--Start row-->
		<nav class="col-1 bg-light text-center d-md-flex flex-row"> <!-- Side bar -->
			<div class="sidebar-sticky">
				<ul class="nav flex-column">
					<li class="nav-item"><a href="dashboard.php" class="nav-link <?php if(PAGE == 'dashboard'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-tachometer-alt mr-2"></i></a></li>

					<li class="nav-item"><a href="userdetail.php" class="nav-link <?php if(PAGE == 'work'){echo 'active bg-danger text-white';} ?>"><i class="fab fa-accessible-icon mr-2 "></i></a></li>

					<li class="nav-item"><a href="groups_detail.php" class="nav-link <?php if(PAGE == 'request'){echo 'active bg-danger text-white';} ?>"><i class="far fa-object-group"></i></a></li>

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'assets'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-database mr-2"></i></a></li>

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'technician'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-tools mr-2"></i></a></li>

					<li class="nav-item"><a href="logout.php" class="nav-link text-primary"><i class="fas fa-sign-out-alt text-primary"></i></a></li>
				</ul>     
			</div>
		</nav> <!-- Side bar end-->

		<div class="col-11">
			<h1 class="text-center font-weight-bolder" style="font-style: italic; text-shadow: 2px 1px 3px #ff3333;">Site Groups</h1>		
			<div class="row row-cols-lg-auto row-cols-md-3 justify-content-around mt-5">

			<?php 
				$sql = "SELECT * FROM groups";
				$res = $conn->query($sql);
				if($res->num_rows > 0){
					while ($group = $res->fetch_assoc()){
						echo '
							<div class="card p-2 shadow shadow-sm my-md-0 mb-3" style="width: 18rem;">
								<img src="../user/'.$group["g_profile"].'" class="card-img-top align-self-center bg-transparent" alt="groupImg" style="width: 150px;">
								<div class="card-body">
									<h5 class="card-title text-center">'.$group["g_name"].'</h5>
									<p class="card-text text-center">'.$group["g_desc"].'</p>
								</div>
							</div>
						';
					}
				}
				else{
					echo "<p class='text-center text-danger'>No group Found !!</p>";
				}
			?>			

			</div>
		</div>

	</div> <!--Row end-->
</div>	<!--Container end-->



<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>