<?php 

function connect_db(){
	$connection = mysqli_connect("localhost", "root", "", "login");
    if (mysqli_connect_errno($connection)) {
	 die(mysqli_connect_error());
    }
    return $connection;
}

function signup ($arg){

	$connection = connect_db();

	$sql = "INSERT INTO `login_system`(`username`, `password`, `email`) VALUES (?,?,?)";
	
	$stmt = mysqli_prepare($connection, $sql);

	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'sss', $arg["fname"], $arg["password"], $arg["email"]);
		$status = mysqli_stmt_execute($stmt);

		if ($status) {
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return true;
		}
		mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return "email already exists";
	}
}
?>