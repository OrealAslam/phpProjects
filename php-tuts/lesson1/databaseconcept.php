<?php 

// estabshling connextion with db
$connect = mysqli_connect("localhost", "root", "", "login");
if (!$connect){
	echo "Connection Failed...!!";
	exit();
}
// Query we want 
// we can use select/choose any field from our db
/*$E_mail= $_POST["E_mail"]; 
$query = "UPDATE `student_info` SET `E_mail`= '$E_mail'";
*/
$ID = $_POST["ID"];
$query = " DELETE FROM `student_info` WHERE `ID`='$ID' ";
//echo "<h3>Enter student_name for his/her record</h3>";
//$First_Name = $_POST['First_Name'];
//$query = "SELECT * FROM `student_info` WHERE `First_Name` = '$First_Name'";

// output our query using mysqli_query();

mysqli_query($connect, $query);
if(mysqli_affected_rows($connect)){
	echo "Record no:$ID deleted successfully..!!";
}
else{
	echo "Error while deleting record";
}
//display query output
/*echo "<pre>";
print_r($result) ."</br>";
echo "</pre>";
*/
/*$display = mysqli_fetch_array($result);
foreach ($result as $display) {
	echo "<pre>";
	print_r($display);
	echo "</pre>";
}
*/



?>