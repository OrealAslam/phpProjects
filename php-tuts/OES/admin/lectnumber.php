<?php 
// delete a lecture
if (isset($_POST['delete'])){

	require '../connection.php';
	$del_lect = mysqli_real_escape_string($conn, $_POST['lect_no']);
	$sql = "DELETE FROM course_lecture WHERE lect_number = ?";
	$stmt = $conn->prepare($sql);

	if ($stmt){
		$stmt->bind_param('i', $del_lect);
		$execute = $stmt->execute();
		if ($execute){
			header("Location: lecture_details.php?success= lecture no. $del_lect deleted");
		}
	}	
}


// edit a lecture
?>