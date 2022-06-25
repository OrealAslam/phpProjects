<?php 

if (isset($_POST['btn'])) {
	//header("refresh:2 url=file_download.php?success= pressed");
	$connection = mysqli_connect("localhost", "root", "", "login");
	if (mysqli_connect_errno()) {
		die(header("refresh:2 url=file_download.php?error= Unable tot connect to DB"));
		
	}
	else{
		$sql = "INSERT INTO`form_upload` (`username`, `password`, `email`) VALUES(?,?,?)";
		$prepare = mysqli_prepare($connection, $sql);
		if ($prepare) {
			$username  = $_POST['username'];
			$password  = $_POST['password'];
			$email     = $_POST['email'];
			

			mysqli_stmt_bind_param($prepare, 'sss', $username, $password, $email);

			$execute   = mysqli_stmt_execute($prepare);
			if ($execute) {
				header("refresh:2 url=file_download.php?success=Congrats form is submitted successfully");
				
			}
			 
			
		}

		else{
			header("refresh:2 url=file_download.php?error= some fields are missing!");
			mysqli_stmt_close($prepare);
			mysqli_close($connection);
		}
	}
}

?>