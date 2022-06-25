<?php 
session_start();
error_reporting(0);
if (!isset($_SESSION['ADMINEMAIL'])){
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}
// Delete User
if (isset($_POST['DelUser'])){
	if (!empty($_POST['UserId'])){

		require_once '../config.php';
		echo '<script>alert("Do you really want to delete this your Account from our record");</script>';
		$userid = filter_var($_POST['UserId'], FILTER_VALIDATE_INT);
		$sql = "DELETE FROM `users` WHERE `users`.`id` = '".$userid."' ";
		$result = $conn->query($sql);
		if ($result == true){
			echo '<script>window.location.href= "http://localhost/FYProject/admin/userdetail.php";</script>';

			echo '<script>location.reload(false);</script>';
		}
		else{
			echo '<script>alert("Unable to delete this your Account from our record because id not found");</script>';
		}
	}
}


// Edit User 
if (isset($_POST['EditUser'])){
	if (!empty($_POST['UserId'])){
		$userid = filter_var($_POST['UserId'], FILTER_VALIDATE_INT);
		require_once '../config.php';
		$sql = "SELECT * FROM users WHERE id = '$userid'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$data = $result->fetch_assoc();
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
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

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

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'request'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-align-center mr-2"></i></a></li>

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'assets'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-database mr-2"></i></a></li>

					<li class="nav-item"><a href="" class="nav-link <?php if(PAGE == 'technician'){echo 'active bg-danger text-white';} ?>"><i class="fas fa-tools mr-2"></i></a></li>

					<li class="nav-item"><a href="logout.php" class="nav-link text-primary"><i class="fas fa-sign-out-alt text-primary"></i></a></li>
				</ul>     
			</div>
		</nav> <!-- Side bar end-->

<!-- User Edit Form start -->

		<div class="col-md-4 offset-md-3 user-edit-panel">
			<div class="row">
				<form class="form-inline">
				  <div class="form-group">
				  	<input type="hidden" class="userid" value="<?php echo $data['id']; ?>">
				    <label for="username">Username</label>
				    <input type="text" id="username" class="form-control mx-sm-3" placeholder="<?php echo $data['username']; ?>">
				  </div>
				  <button type="button" id="Uname" class="btn btn-outline-info">Update</button>
				</form>
				<small class='text-danger' id="Umsg"></small>
			</div>

			<div class="row my-5">
				<form class="form-inline">
				  <div class="form-group">
				  	<input type="hidden" class="userid" value="<?php echo $data['id']; ?>">
				    <label for="userpassword">Password</label>
				    <input type="password" id="userpassword" class="form-control mx-sm-3" autocomplete="off" placeholder="<?php echo $data['password']; ?>">
				  </div>
				  <button type="button" id="Upass" class="btn btn-outline-success">Update</button>
				</form>
				<small class='text-danger' id="UPmsg"></small>
			</div>

			<div class="row my-5">
				<label for="UserAction">Restrict User</label>
		        <select class="custom-select" id="UserAction" required>
			        <option selected disabled value="">Choose...</option>
			        <option value="<?php echo $_POST['UserId']; ?>">Block</option>
			        <option value="<?php echo $_POST['UserId']; ?>">Unblock</option>
			        <input type="hidden" class="userid" value="<?php echo $data['id']; ?>">
		        </select>
			</div>
			<a href="userdetail.php" class="btn btn-block btn-secondary">Previous Page</a>
		</div>

<!-- User Edit Form end -->

	</div> <!--Row end-->
</div>	<!--Container end-->

</body>
<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="../js/script.js"></script>

<script type="text/javascript">
// Block User From Admin side
	$(document).ready(function(){
		$("#UserAction").change(function(){
			var action = $("#UserAction option:selected").text();
			var userid = $(".userid").val();

			$.ajax({
				method: 'POST',
				url: 'privilleges.php',
				data: {action, userid},
				success: function(responce){
					alert(responce);
				}
			})
		});
	});
</script>

</body>
</html>

<?php 
		}
	}
	else{
		echo "<script>alert('User id not found.');</script>";
		echo "<script>window.location.href='userdetail.php';</script>";
	}
}	
?>
	

