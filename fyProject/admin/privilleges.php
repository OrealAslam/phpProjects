<?php 
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Karachi');
if(!isset($_SESSION['ADMINEMAIL'])){
	echo "<script>window.location.href= 'http://localhost/FYProject/admin/login.php';</script>";
}
require_once '../config.php';
// Update Username

if(!empty($_POST['username']) AND !empty($_POST['userid'])){
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	if(!filter_var($_POST['userid'], FILTER_VALIDATE_INT)){
		echo "<script>alert('Invalid id track');</script>";
	}
	else{
		
		$id = mysqli_real_escape_string($conn, $_POST['userid']);
		$username = mysqli_real_escape_string($conn, $_POST['username']);

		$sql = "UPDATE users SET username = ? WHERE id = ?";
		$stmt = $conn->prepare($sql);
		if($stmt){
			$stmt->bind_param('si', $username, $id);
			if ($stmt->execute()){
				$sql = "SELECT username FROM users WHERE id = '$id'";
				$result = $conn->query($sql);
				$data = $result->fetch_array();
				echo $data[0];
			}
		}
	}
}

// Update Password

if(!empty($_POST['Upass']) AND !empty($_POST['userid'])){
		$Upass = filter_var($_POST['Upass'], FILTER_SANITIZE_STRING);
	if(!filter_var($_POST['userid'], FILTER_VALIDATE_INT)){
		echo "<script>alert('Invalid id track');</script>";
		echo "<script>alert('Username updated');</script>";
	}
	else{
		$id = mysqli_real_escape_string($conn, $_POST['userid']);
		$Upass = mysqli_real_escape_string($conn, $_POST['Upass']);

		$sql = "UPDATE users SET password = ? WHERE id = ?";
		$stmt = $conn->prepare($sql);
		if($stmt){
			$stmt->bind_param('si', $Upass, $id);
			if($stmt->execute()){
				$sql = "SELECT password FROM users WHERE id = '$id'";
				$result = $conn->query($sql);
				$data = $result->fetch_array();
				echo $data[0];
				echo "<script>alert('Password updated successfully');</script>";
			}
		}
	}
}

// Restrict or Block a user

if (!empty($_POST['action']) AND !empty($_POST['userid'])){
	
	$action_flag = mysqli_real_escape_string($conn, $_POST['action']);
	$userid      = mysqli_real_escape_string($conn, $_POST['userid']);
	$time        =  date('h:i:sa');

	if (!filter_var($userid, FILTER_VALIDATE_INT)){
		echo "Invalid userid passed";
	}

	if ($action_flag == 'Block'){
		$sql = "INSERT INTO blockuser (user_id, action, __TIME__) VALUES (?,?,?)";
		$stmt = $conn->prepare($sql);

		if ($stmt){
			$stmt->bind_param('iss', $userid, $action_flag, $time);
			if($stmt->execute()){
				echo "User Blocked";
			}
			else{echo "User already blocked";}			
		}
	}

	if ($action_flag == 'Unblock'){
		$sql = "DELETE FROM blockuser WHERE user_id = ?";
		$stmt = $conn->prepare($sql);

		if ($stmt){
			$stmt->bind_param('i', $userid);
			if($stmt->execute()){
				echo "Unblocked Successfully";
			}
			else{echo "User not blocked by Admin";}			
		}
	}
}

?>