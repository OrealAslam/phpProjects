<?php 
$conn = new mysqli("localhost", "root", "", "oes");
if($conn->error){
	echo "DB connection failed";
}
else{
	return $conn;
}

?>
