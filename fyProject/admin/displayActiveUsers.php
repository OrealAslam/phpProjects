<?php 
session_start();
error_reporting(0);
if (!isset($_SESSION['ADMINEMAIL'])){
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}
?>

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
 <style type="text/css">
 	.imageDisplay{
 		width: 80px;
 		height: 80px;
 		margin-left: auto;
 		margin-right: auto;
 		border-radius: 45px;
 		display: block;
 	}
 </style>
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

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'request'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-align-center mr-2"></i></a></li>

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'assets'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-database mr-2"></i></a></li>

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'technician'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-tools mr-2"></i></a></li>

					<li class="nav-item"><a href="logout.php" class="nav-link text-primary"><i class="fas fa-sign-out-alt text-primary"></i></a></li>
				</ul>     
			</div>
		</nav> <!-- Side bar end-->

	<!-- Displaying Active users -->
		<div class="col-11">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
				  <thead class="text-center">
				    <tr>
				      <th scope="col">Profile Picture</th>
				      <th scope="col">Username</th>
				      <th scope="col">Email</th>
				      <th scope="col">Gender</th>
				    </tr>
				  </thead>
<?php 

	require_once '../config.php';
	$sql = "SELECT * FROM users WHERE status = 1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0 ){
		while ($users = $result->fetch_assoc()){
?>
					<tbody>
						<tr>
							<td><img class="imageDisplay" src="<?php echo '../user/profile_pic/'.$users['picture']; ?>" alt="userimg"></td>
							<td><?php echo $users['username']; ?></td>
							<td><?php echo $users['email']; ?></td>
							<td><?php echo $users['gender']; ?></td>
						</tr>
					</tbody>
<?php
		}
	}
	else{
		echo '<tbody>';
		echo '0 user available online';
		echo '</tbody>';
	}
?>
				</table>
			</div>
		</div>
	<!-- Displaying Active users -->

	</div> <!--End row-->
</div> <!-- Container End -->