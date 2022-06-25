<?php 
$conn = new mysqli('localhost', 'root','', 'fyproject');
if ($conn->errno){
	die('Error: '.$conn->error());
}
else{
	return $conn;
}
?>




