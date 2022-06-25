<?php 
// Connection with DB
function connect_db(){
	$connection = mysqli_connect("localhost","root","", "project");
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	}
	return $connection;
}

// Take user info and it into DB
function get_info($arg){
	$connection = connect_db();

	$sql = "INSERT INTO `student_info`(`username`, `password`,`email`, `dob`, `phone`, `gender`) VALUES (?,?,?,?,?,?)";
	$password = password_hash($arg["password"], PASSWORD_DEFAULT);
	
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {

		mysqli_stmt_bind_param($stmt, 'ssssss', $arg["username"],$password , $arg["email"], $arg["dob"], $arg["phone"], $arg["gender"]);
		$status = mysqli_stmt_execute($stmt);
		if ($status) {
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return true;
		}
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return "Email exists";
	}	    
}

function authenticate($arg){
	$connection = connect_db();
	$password = $arg["password"];

	$sql = "SELECT * FROM `student_info` WHERE `email`=?";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 's', $arg["email"]);
		mysqli_stmt_bind_result($stmt, $db_id, $db_username, $db_password, $db_email, $db_dob, $db_phone, $db_gender);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);

		if (!empty($db_email) && !empty($db_id)) {
			if (password_verify($password,  $db_password)) {
				mysqli_stmt_close($stmt);
				mysqli_close($connection);
				return array("id" =>$db_id, "username"=> $db_username, "password"=>$db_password, "email"=> $db_email, "dob"=>$db_dob, "phone"=> $db_phone, "gender"=> $db_gender);
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($connection);
		return "Invalid credensials";
	}
}

function display_record(){
	$connection = connect_db();
	$sql = "SELECT * FROM `student_info`";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		mysqli_stmt_bind_result($stmt, $db_username, $db_email, $db_dob, $db_phone, $db_gender);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);
		
	}
}

function check_old_pass($arg){
	$connection = connect_db();
	$old_password = $arg["old-password"];
	$id           = $arg["id"];

	$sql = "SELECT `password` FROM `student_info` WHERE `id`=?";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_bind_result($stmt, $db_password);
		mysqli_execute($stmt);
		mysqli_stmt_fetch($stmt);

		if (!empty($db_password)) {
			if (password_verify($old_password, $db_password)) {
				mysqli_stmt_close($stmt);
				mysqli_close($connection);
				return true;
			}
			   mysqli_stmt_close($stmt);
				mysqli_close($connection);
				return "incorrect password";
		}

	}
}

function update_password($arg){
	$connection = connect_db();
	$id         = $arg["id"];
	$new_password = password_hash($arg["new-pass"], PASSWORD_DEFAULT);
	$sql = "UPDATE `student_info` SET `password`=? WHERE `id`=?";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, 'si', $new_password, $id);
		mysqli_stmt_execute($stmt);
		$row = mysqli_stmt_affected_rows($stmt);
		if ($row === 1) {
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return true;
		}
		mysqli_stmt_close($stmt);
		mysqli_close($connection);
		return "OOHOH!!";		
	}
		
}


?>