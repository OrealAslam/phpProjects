<?php 

$conn = new mysqli('localhost', 'root', '', 'ischool_db');
if($conn->connect_error){
	die('connection failed!!');
}
else{
	return $conn;
}

?>