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

					<li class="nav-item"><a href="adminSettings.php" class="nav-link <?php if(PAGE == 'technician'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-tools mr-2"></i></a></li>

					<li class="nav-item"><a href="logout.php" class="nav-link text-primary"><i class="fas fa-sign-out-alt text-primary"></i></a></li>
				</ul>     
			</div>
		</nav> <!-- Side bar end-->

		<div class="col-sm-11 col-12 p-0">
			<div class="row justify-content-center">
				<div class="col-sm-10 p-0 text-light">
					<div class="card-deck text-center">
					  <div class="card card-lg-3 bg-danger">
					    <div class="card-body">
					      <h5 class="card-title">Total Users</h5>
					      <div class="card-body">
					      	<i class="fas fa-users card-icons"></i>
					      </div>
					    </div>
					    <div class="card-footer">
					      <a href="userscount.php"class="btn btn-block anchor">View</a>
					    </div>
					  </div>
					  <div class="card card-lg-3 bg-info">	  	
					    <div class="card-body">
					      <h5 class="card-title">Online Users</h5>
					      <div class="card-body">
					      	<!-- <i class="fas fa-signal card-icons"></i> -->
					      	<b id="active-users"></b>
					      </div>
					    </div>
					    <div class="card-footer">
					      <a href="displayActiveUsers.php"class="btn btn-block anchor">View</a>
					    </div>
					  </div>
					  <div class="card card-lg-3 card bg-secondary">
					    <div class="card-body">
					      <h5 class="card-title">Groups</h5>	     
					      <div class="card-body">
					      	<p id="TotalGroups"></p>
					      </div>
					    </div>
					    <div class="card-footer">
					      <a href="groups_detail.php"class="btn btn-block anchor">View</a>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>

	</div> <!--End row-->
</div> <!-- Container End -->

<!-- users TABLE start -->

<?php 
require_once '../config.php';
$sql = "SELECT * FROM users LIMIT 6";
$result = $conn->query($sql);
if ($result->num_rows > 0){
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Username</th>
						<th>Email</th>
						<th>Gender</th>
					</tr>
				</thead>
				<tbody>
<?php 
	while ($data = $result->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$data['id']."</td>";
		echo "<td>".$data['username']."</td>";
		echo "<td>".$data['email']."</td>";
		echo "<td>".$data['gender']."</td>";
		echo "</tr>";
	}
}
?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- users TABLE end -->

<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="js/myScript.js"></script> 

<script type="text/javascript">
	function GroupCount(){
		$.ajax({
			type: 'post',
			url: 'operations.php?sum=group',
			success: function(responce){
				$("#TotalGroups").html(responce);
			}
		});
	}
	GroupCount();
</script>
</body>
</html>



<!-- main DASHBOARD code end -->
