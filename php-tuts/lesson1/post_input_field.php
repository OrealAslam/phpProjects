<?php
$connection = mysqli_connect("localhost", "root", "", "login");
if(!$connection){
	echo "Unabe to connect...!!";
	exit();
}

$First_Name = $_POST['First_Name'];
$Last_Name = $_POST['Last_Name'];
$E_mail = $_POST['E_mail'];
$sql = "INSERT INTO `student_info`(`First_Name`, `Last_Name`, `E_mail`) VALUES ('$First_Name', '$Last_Name', '$E_mail')";

mysqli_query($connection, $sql);
//mysqli_affected_rows  tells us affected rows  i.e data is inserted
if(mysqli_affected_rows($connection)){

	echo "Data inserted successfully". "<br>";
}

else{
	echo "Error while inserting data". "<br>";
}



?>