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

		<div class="col-md-5 offset-md-3 mt-3 col-sm-6 0ffset-6">
			<form action="">
		      
		        <div class="form-group">
		          <label class="form-label" for="oldpass">Old Password</label>
		          <input type="password" id="oldpass" name="oldpass" class="form-control" placeholder="enter old password">
		        </div>
		        <div class="form-group">
		          <label class="form-label" for="newpass">New Password</label>
		          <input type="password" id="newpass" name="newpass" class="form-control" placeholder="enter new password">
		        </div>
		        <div class="form-group">
		          <label class="form-label" for="confirmpass">Confirm new Password</label>
		          <input type="password" id="confirmpass" name="confirmpass" class="form-control" placeholder="confirm new password">
		        </div>
		        <button type="button" id="updatepassword" class="btn btn-danger">Update Password</button>
		        <span class="ml-2" id="passresponce"></span>
		      
		</div>

	</div> <!--End row-->
</div> <!-- Container End -->


<!-- Link Bootstrap & JS -->
<script src="../js/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="js/myScript.js"></script>

<script type="text/javascript">

	$('#updatepassword').click(function(){
    var oldpass = $('#oldpass').val();
    var newpass = $('#newpass').val();
    var confirmpass = $('#confirmpass').val();

    if ((oldpass == '') || (newpass == '') || (confirmpass == '')){
      alert('Credentials required');
    }
    else{
      $.ajax({
        type: 'POST',
        url : 'operations.php',
        data : {old: oldpass, new: newpass, cpass: confirmpass},
        success: function(responce){
          $('#passresponce').html(responce);
        }      
      });
    }
  });

</script>
</body>
</html>