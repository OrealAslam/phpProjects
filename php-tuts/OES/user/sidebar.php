<?php 
require '../connection.php';
if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}
else{
$sql = "SELECT pic_source, username FROM user_login WHERE email = '".$_SESSION['userlogin']['useremail']."'";

$result = $conn->query($sql);
$pic    = $result->fetch_assoc();
}

?>
<!-- sidebar start -->
<div class="container-fluid">
	<div class="row justify-content-sm-center justify-content-lg-start px-md-1">
		<!-- sidebar start 1st column -->
		<div class="col-sm-8 mb-sm-5 mb-md-0 mt-md-1 mt-3 col-lg-2">
			<div class="sidebar-sticky">
				<div class="d-md-inline d-none">
					<img src="<?php echo $pic['pic_source']; ?>" class="img-fluid mt-3 d-block mx-auto rounded-circle" style="width: 140px; height: 140px;">
					<p class="text-center"><?php echo $pic['username']; ?></p>
				</div>
				<ul class="nav flex-column">
					<li class="nav-item"><a href="userdashboard.php" class="nav-link <?php if(PAGE == 'Dashboard'){echo 'active bg-warning text-white';} ?>"><i class="fas fa-user mr-2"></i>Dashboard</a></li>

					<li class="nav-item"><a href="userprofile.php" class="nav-link <?php if(PAGE == 'Profile'){echo 'active bg-warning text-white';} ?>"><i class="fas fa-user mr-2"></i>Profile</a></li>

					<li class="nav-item"><a href="usercourses.php" class="nav-link <?php if(PAGE == 'Courses'){ echo 'active bg-warning text-white';}?>"><i class="fas fa-book-open"></i>Courses</a></li>

					<li class="nav-item"><a href="tutorhelp.php" class="nav-link <?php if(PAGE == 'Tutor Help'){echo 'active bg-warning text-white';} ?>"><i class="fas fa-chalkboard-teacher mr-2"></i>Tutor Help</a></li>

					<li class="nav-item"><a href="logout.php" class="nav-link <?php if(PAGE == ''){echo 'active bg-warning text-white';} ?>"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
				</ul>
			</div>
		</div>

		<!-- sidebar end 1st column -->