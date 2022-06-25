<?php 

if (isset($_POST['btn'])) {
	
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	$Email = $_POST['email'];

	$connection = mysqli_connect("localhost", "root", "", "login");

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	}
		$sql = "INSERT INTO `form_upload`(`username`, `password`, `email`) VALUES(?,?,?)";
		$stmt = mysqli_prepare($connection, $sql);
		if ($stmt) {
			mysqli_stmt_bind_param($stmt, 'sss', $Username, $Password, $Email);
			$execution = mysqli_stmt_execute($stmt);
			if($execution){
				header("Location: tables.php?success= Data inserted Successfully");	
			}
			else{
				header("Location: tables.php?error= Error while inserting data into table");
			}
		}

	
}


?>