<?php 
function connect_db(){
	$connection = mysqli_connect("localhost", "root", "", "lms system");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error('failed to connect'));
	}
	return $connection;
}
function upload_info($arg){
	$connection = connect_db();
	$sql = "INSERT INTO `stu_register`(`fname`, `lname`, `email`, `password`,`dob`, `gender`)VALUES(?,?,?,?,?,?)";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt) {
		$password = password_hash($arg['password'], PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, 'ssssss', $arg['fname'], $arg['lname'], $arg['email'], $password, $arg['dob'], $arg['gender']);
		$status = mysqli_stmt_execute($stmt);
		if ($status) {
			mysqli_stmt_close($stmt);
			mysqli_close($connection);
			return true;
		}
	}
	    mysqli_stmt_close($stmt);
		mysqli_close($connection);
		return "email exists";
}


function get_info_from_DB($arg){
	$connection = connect_db();
	$password = $arg['password'];
	$sql = "SELECT * FROM `stu_register` WHERE `email` = ?";
	$stmt = mysqli_prepare($connection, $sql);
	if ($stmt){
		mysqli_stmt_bind_param($stmt, 's', $arg['email']);
		mysqli_stmt_bind_result($stmt, $db_id, $db_fname, $db_lname, $db_email, $db_password, $db_dob, $db_gender);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_fetch($stmt);

		if (!empty($db_id) && !empty($db_email) && !empty($db_password)){
			if (password_verify($password, $db_password)) {
				return array(
						"id" =>$db_id,
						"fname" => $db_fname,
						"lname"  => $db_lname,
						"email"	 => $db_email,
						"password" => $db_password,
						"dob"      => $db_dob,
						"gender"   => $db_gender
						);
			}
			else{
				return "info not found";
			}
		}
	}
}

function join_DB(){
	$connection = connect_db();
	$sql = "SELECT * FROM `profile_photo` LEFT JOIN `stu_register` ON `profile_photo`.`email` = `stu_register`.`email`";
	mysqli_query($connection, $sql);
}

?>