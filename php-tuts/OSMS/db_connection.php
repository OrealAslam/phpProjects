<?php 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "osms";
$port    = 3306;

//Creating DB connection

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $port);

//Checking connection
	if ($conn->connect_errno){
		die("Connection Failed") .$conn->connect_error();
	}
	return $conn;	
	// else{
	// 	echo "Connected";
	// }
?>