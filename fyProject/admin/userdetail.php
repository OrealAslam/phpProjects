<?php 
session_start();
error_reporting(0);
if (!isset($_SESSION['ADMINEMAIL'])){
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}
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
		<!-- User Detail Table start -->
		<div class="col-11">
			<div class="row">
				<div class="col-12">
					<form action="" class="col-lg-2 float-right">
						<div class="form-group">
							<input type="text" class="form-control border-info" name="search" id="search" placeholder="Search a User">
						</div>
					</form>
				</div>
			</div>
<?php 
require_once '../config.php';
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0){
?>
			<div class="row">
				<div class="col-11">
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="SearchUser">
							<thead>
								<tr>
									<th>Id</th>
									<th>Username</th>
									<th>Email</th>
									<th>Password</th>
									<th>Picture</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
<?php 
while ($data = $result->fetch_assoc()){
?>	
								<tr>
									<td><?php echo $data['id']; ?></td>
									<td><?php echo $data['username']; ?></td>
									<td><?php echo $data['email']; ?></td>
									<td><?php echo $data['password']; ?></td>
									<td>
										<img src="<?php echo '../user/profile_pic/'.$data['picture']; ?>" alt="User Img" class="img-fluid user-data">
									</td>
									<td>
										<form action="edituser.php" method="POST">
											<input type="hidden" name="UserId" value="<?php echo $data['id']; ?>">
											<div class="btn-group btn-block" role="group" aria-label="Basic example">
											  <button type="submit" name="EditUser" class="btn btn-success"><i class="fas fa-user-edit"></i></button>
											  <button type="submit" name="DelUser" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
											</div>
										</form>
									</td>
								</tr>
							
<?php
	}
}
?>				
							</tbody>
						</table>
					</div>
				</div>


			</div>
		</div>

		<!-- User Detail Table end -->

	</div> <!--Row end-->
</div>	<!--Container end-->


<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$("#search").on('keyup', function(){
		var search = $("#search").val();
		var search = $.trim(search);

		if (search.length !== 0){
			$.ajax({
				type: 'post',
				url: 'operations.php',
				data: {Asearch: search},
				success: function(feedback){
					$("#SearchUser").html(feedback);
				}
			});
		}
		else{
			window.location.reload('userdetail.php');
		}
	});

</script>  

</body>
</html>