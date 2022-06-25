<?php 
	function connect_db(){
		$connection = mysqli_connect("localhost", "root", "", "project");
		if (mysqli_connect_errno()) {
			die(mysqli_connect_error());
		}

		return $connection;
	}

	function register($arg){
		$connection = connect_db();
		$sql  = " INSERT INTO `traders_register`(`fullname`, `email`, `password`) VALUES (?,?,?)";
		$stmt = mysqli_prepare($connection, $sql);
		if ($stmt) {
			mysqli_stmt_bind_param($stmt, 'sss', $arg["fullname"], $arg["email"], $arg["password"]);
			$status = mysqli_stmt_execute($stmt);
			if ($status) {
				mysqli_stmt_close($stmt);
				mysqli_close($connection);
				return true;
			}
				mysqli_stmt_close($stmt);
				mysqli_close($connection);
				return "Email exists";
		}
			
}

function authenticate_login($arg){
	$connection = connect_db();
	$email = $arg['email'];
	$password = $arg['password'];

	$sql = "SELECT * FROM `traders_register` WHERE `email` = ?";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 's', $email);
		mysqli_stmt_bind_result($stmt, $db_id, $db_fullname, $db_email, $db_passowrd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);

		if (!empty($db_id) && !empty($db_email)){
			if (password_verify($password, $db_passowrd)) {
				return array("id"=> $db_id, "fullname" =>$db_fullname, "email"=>$db_email, "password"=> $db_passowrd);
			}
			else{
				return "not matched";
			}
		}

	}
}


function old_password($arg){
	$id = $arg['id'];
	$new_password = $arg['new-password'];
	$confirm_password = $arg['confirm-new-password'];
	if ($arg['new-password'] !== $arg['confirm-new-password']) {
		return "new && confirm new passkey must be same";
	}

	$old_password = $arg['old-password'];
	$connection = connect_db();
	$sql = "SELECT `password` FROM `traders_register` WHERE `id`=?";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_bind_result($stmt, $db_passowrd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);
		if (password_verify($old_password, $db_passowrd)) {
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return true;
		}
		mysqli_stmt_close($stmt);
		mysqli_close($connection);
		return "invalid old passkey";

	}

}

function update_password($arg){
	$connection = connect_db();
	$password = password_hash($arg['new-password'], PASSWORD_DEFAULT);
	$sql = "UPDATE `traders_register` SET `password`=? WHERE `id`=?";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'si', $password, $arg['id']);
	    mysqli_stmt_execute($stmt);
		if ($rows = mysqli_stmt_affected_rows($stmt)) {
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return true;
		}
		mysqli_stmt_close($stmt);
		mysqli_close($connection);
		return "not updated";
	}
}

?>