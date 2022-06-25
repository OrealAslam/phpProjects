<?php 
session_start();

if (!isset($_SESSION['ADMINEMAIL'])) {
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}

else{

	$_SESSION['ADMINEMAIL'] = [];
	unset($_SESSION);
	session_destroy();
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}


?>