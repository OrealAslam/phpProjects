<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}

// Searching for a Group

if (isset($_POST['searchGroup'])){
	include_once '../config.php';

	$search = mysqli_real_escape_string($conn, $_POST['searchGroup']);

	$sql = "SELECT * FROM groups WHERE g_name LIKE '%$search%' ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){

		$data = $result->fetch_assoc();
		echo "<form method='POST' action='mygroups.php'>";
		echo "<input type='hidden' value='".$data['g_id']."'>";

		echo "<button type='submit' name='search' class='btn btn-default'>";
		echo "<div class='card my-2'>";
		echo "<div class='card-body'>";
		echo "<div class='row'>";

		echo "<div class='col-3 justify-content-center align-self-center'>";
		echo "<img src='".$data['g_profile']."' class='img-fluid' style='width:60px'>";
		echo "</div>";
		echo "<div class='col-8'>";
		echo "<h5 class='card-title'>'".$data['g_name']."'</h5>";
		echo "<p class='card-text'>'".$data['g_desc']."'</p>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</button>";
		echo "</form>";
	}
	else{
		echo "<span class='text-danger'>Nothing Found!</span>";
	}
}

?>