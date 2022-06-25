<?php 
session_start();
if (isset($_SESSION["logged"]["email"])){
	// echo "<h1>"."Welcome to Home Page<br>".$_SESSION["logged"]['fname']."</h1><br><br>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css//dashboard-style.css">
</head>
<body>
	<div id="container">
		<div id="side-wrapper">
			<h3>School Management</h3>
			<hr>
			<a href="home_page.php" style="color: #ffa600;">DASHBOARD</a>
			<a href="student_db_table.php">STUDENTS</a>
			<a href="#">FEESCOLLECTION</a>
			<a href="#">HOSTELS</a>
			<a href="#">CLASSES</a>
			<a href="#">SESSIONS</a>
			<a href="#">NOTICES</a>
			<a href="#">FEESTRUCTURE</a>
			<a href="#">ATTENDENCE</a>
		</div>
		<!-- side-wrapper ends here -->

		<div id="main-window">
			<h3>School Management System</h3>
			<hr>
			<div class="dashboard">
				<h5>Welcome to Dashboard</h5>
			</div>

			<div id="overall-info">
				<div class="info">
					<h6>Students</h6>
					<a href="#">-> View</a>
				</div>
				<div class="info">
					<h6>Fee Collection</h6>
					<a href="#">-> View</a>
				</div>
				<div class="info">
					<h6>Banks</h6>
					<a href="#">-> View</a>
				</div>
				<br>
				<div class="info">
					<h6>Teachers</h6>
					<a href="#">-> View</a>
				</div>
				<div class="info">
					<h6>Courses</h6>
					<a href="#">-> View</a>	
				</div>
				<div class="info">
					<h6>Time Table</h6>
					<a href="#">-> View</a>
				</div>
				<br>
				<div class="info">
					<h6>Notices</h6>
					<a href="#">-> View</a>
				</div>
				<div class="info">
					<h6>Subjects</h6>
					<a href="#">-> View</a>
				</div>
				<div class="info">
					<h6>Events</h6>
					<a href="#">-> View</a>
				</div>
			</div>
		</div>

		<!-- main window ends -->
	</div>
</body>
</html>
<?php
}
else{
	// header("Location: login.php");
	include('functions.php');

	error("Unable to login");
}
?>