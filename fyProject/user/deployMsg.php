<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])){
	echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{
 include '../config.php';
date_default_timezone_set('Asia/Karachi');
$time =  date('g:i:s');
$date = date('d-M-y');
$status = 0;

$sql = "SELECT * FROM users WHERE email = '".$_SESSION['USEREMAIL']."'";
$result = $conn->query($sql);
$res = $result->fetch_assoc();

$user_id = mysqli_real_escape_string($conn, $_SESSION['UID']);

// insert msg to DB code here
if(!empty($_POST['Message']) AND !empty($_POST['to_id'])){
$message = mysqli_real_escape_string($conn, $_POST['Message']);
// $to_id = mysqli_real_escape_string($conn, $_POST['to_id']);

$to_id = filter_var($_POST['to_id'], FILTER_VALIDATE_INT);
if(!$to_id){
	echo "Invalid ID passed";
}
else{

	$sql = "INSERT INTO messages (user_id, message, from_id, to_id, messagetime, messagedate, status) VALUES ('$user_id', '$message', '$user_id', '$to_id', '$time', '$date', '$status');";
	$fire = $conn->query($sql);
	if ($fire){
		$query = "SELECT * FROM messages WHERE from_id = '$user_id' AND to_id = '$to_id' ";
		$result = $conn->query($query);
		if ($result->num_rows > 0){
			while ($msgs = $result->fetch_assoc()){
				echo $msgs['message'];
			}
		}
	}
	else{
		echo $conn->error;
	}

}
}

}

?>