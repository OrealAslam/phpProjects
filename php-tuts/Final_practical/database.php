<?php 
function connect(){
	$hostname = "localhost";
	$dbuser   = "root";
	$dbpassword = "";
	$db_name    = "practical_paper"; 

	$conn = mysqli_connect($hostname, $dbuser, $dbpassword, $db_name);

	if (mysqli_connect_errno()){
		die($conn) . mysqli_connect_error();
	}
	else{
		return $conn;
	}
}

?>