<?php
$connection = mysqli_connect("localhost", "root", "", "login");
if(!$connection){
	echo "Unable to connect to server!!";
	die();
}

$id = $_POST["id"];
$query= "SELECT * FROM `users` JOIN `mobile_number` ON `users`.'$id'=`mobile_number`.`user_id`";

$sql = mysqli_query($connection, $query);
if(isset($sql)){
	echo "<h2>Successfully find the result against your ID</h2>";
	
	$result = mysqli_fetch_assoc($sql);
	echo "<pre>";
	print_r($result);
	echo "</pre>";
}


?>