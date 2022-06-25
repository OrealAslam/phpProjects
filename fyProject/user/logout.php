<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
	echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}

else{
	require_once '../config.php';
	
	$update_status = "UPDATE users SET status = 0 WHERE id = {$_SESSION['UID']} ";
	$result = $conn->query($update_status);

	$_SESSION['USEREMAIL'] = [];
	unset($_SESSION);
	session_destroy();

	echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}


?>