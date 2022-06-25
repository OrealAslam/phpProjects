<?php 
session_start();
error_reporting(0);

if (!isset($_SESSION['ADMINEMAIL'])){
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}

require_once '../config.php';
$sql = "SELECT * FROM users WHERE status = 1";
$result = $conn->query($sql);
$count = $result->num_rows;
echo $count;
?>