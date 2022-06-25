<?php 
function connect_db(){
	$connection = mysqli_connect("localhost", "root", "", "login");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error());
	}
	return $connection;
}

function signup($arg){

	$connection = connect_db();
	$sql  = "INSERT INTO `login_system`(`username`, `password`, `email`) VALUES (?,?,?)";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'sss', $arg["username"], $arg["passkey"], $arg["email"]);
		$status = mysqli_stmt_execute($stmt);
		if ($status) {
			return true;
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
		}
		mysqli_stmt_close($stmt);
		mysqli_close($connection);
		return "Email already exists";
	}
}

function authenticate($arg){

	$connection = connect_db();	
	$password   = $arg['passkey'];
	$sql        = " SELECT * FROM `login_system` WHERE `email`= ? ";
	$stmt 		= mysqli_prepare($connection, $sql);

	if ($stmt) {
	 	mysqli_stmt_bind_param($stmt, 's', $arg["email"]);
	 	mysqli_stmt_bind_result($stmt, $db_id, $db_username, $db_password, $db_email);
	 	mysqli_stmt_execute($stmt);
	 	mysqli_stmt_fetch($stmt);
	 	
	 	if (!empty($db_id)) {
	 		if (password_verify($password, $db_password)) {
	 			mysqli_stmt_close($stmt);
	 			mysqli_close($connection);
	 			return array("id" =>$db_id, "username" =>$db_username, "password" =>$db_password, "email" =>$db_email);
	 		}
	 		    mysqli_stmt_close($stmt);
	 			mysqli_close($connection);
	 		return	"incorrect credentials";
	 		
	 	}
	 }
	  
}

function check_old_password($arg){
	$connection = connect_db();

	$old_password = $arg['old_password'];
	$id 		  = $arg['id'];

	$sql = "SELECT `password` FROM `login_system` WHERE `id`=?";
	$stmt  = mysqli_prepare($connection, $sql);

	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_bind_result($stmt, $db_password);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);

		if (!empty($db_password)) {
			if (password_verify($old_password, $db_password)) {
				mysqli_stmt_close($stmt);
				mysqli_close($connection);
				return true;
			}
				mysqli_stmt_close($stmt);
				mysqli_close($connection);
				return "Invalid password";
		}
	}
}

function update_password($arg){

	$connection = connect_db();
	$new_password = password_hash($arg['new_password'], PASSWORD_DEFAULT);
	$id         = $arg['id'];

	$sql = "UPDATE `login_system` SET `password`=? WHERE `id`=?";
	$stmt = mysqli_prepare($connection, $sql);

	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'si', $new_password, $id);
		mysqli_stmt_execute($stmt);
		
		$affected = mysqli_stmt_affected_rows($stmt);
		if ($affected) {
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return true;
		}
				mysqli_stmt_close($stmt);
				mysqli_close($connection);
	return "problems updating password";
		
	}
}

?>