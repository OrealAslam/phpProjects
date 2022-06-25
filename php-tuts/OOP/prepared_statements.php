<?php 
	$conn = new mysqli("localhost", "root", "", "login");
	if ($conn->connect_errno){
		echo "Failed to connect" . $conn->connect_error();
	}
	echo("<h3>Insering data into DB</h3>");
	// $sql = "INSERT INTO `form_upload` (`username`, `password`, `email`) VALUES (?,?,?)";
	// $stmt = $conn->prepare($sql);

	// if ($stmt){
	// 	$username = "Usama Aslam";
	// 	$password = "usamaaslam";
	// 	$email    = "usamachohan11@gmail.com";
	// 	$stmt->bind_param('sss', $username, $password, $email);
	// 	if ($stmt->execute()){
	// 		echo "Data inserted successfully";
	// 	}
	// 	else{
	// 		echo "Error while inserting data into DB";
	// 	}
	// }
	echo "<h3>Selecting data from DB</h3>";
	// $sql = "SELECT * FROM `form_upload`";
	// $result = $conn->query($sql);
	// 	while($arr = $result->fetch_assoc()){
	// 			echo "<pre>";
	// 			echo $arr["id"]."  ".$arr["username"]."  ".$arr["password"]. "  ".$arr["email"];
	// 			echo "</pre>";
	// 		}
		
	echo "<h3>Updating data to DB</h3>";

	// $sql = "UPDATE `form_upload` SET `username` = ? , `password` = ? WHERE `id` = ?";
	// $stmt = $conn->prepare($sql);
	// $username = "Usama Chohan";
	// $password = "usamachohan";
	// $id 	  = 30;	
	// $stmt->bind_param('ssi', $username, $password, $id);
	// $execute = $stmt->execute();

	// if ($execute){
	// 	$stmt->close();
	// 	$conn->close();
	// 	echo "Data updated successfully..!!!!";
	// }	
	// else{
	// 	$stmt->close();
	// 	$conn->close();
	// 	echo "Unable to update data";
	// }

	echo "<h3>Deleting specific data from DB</h3>";

	// $sql = "DELETE FROM `form_upload` WHERE `id` = ?";

	// $stmt = $conn->prepare($sql);
	// if (!$stmt){
	// 	echo "Error while preparing statement";
	// }
	// $id  = 33;
	// $stmt->bind_param('i', $id);
	// $result = $stmt->execute();

	// if (!$result){
	// 	$stmt->close();
	// 	$conn->close();
	// 	echo "Unable to delete data from DB";
	// }
	// else{
	// 	$stmt->close();
	// 	$conn->close();
	// 	echo "Data deleted successfully from DB";
	// }
	
?>