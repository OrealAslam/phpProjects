<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
	echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{

date_default_timezone_set('Asia/Karachi');
$time =  date('g:i:s');
$date = date('d-M-y');
$status = 0;

include '../config.php';
	if (isset($_POST['text'])){
		$post = mysqli_real_escape_string($conn, $_POST['text']);

		$sql = "INSERT INTO userpost(user_id, postText, postdate, posttime, status) VALUES (?,?,?,?,?)";
		$stmt = $conn->prepare($sql);

		if ($stmt){
			$stmt->bind_param('isssi', $_SESSION['UID'], $post, $date, $time, $status);
			if ($stmt->execute()){
				echo "Posted Successfully";
			}
			else{
				// echo "Error: while uploadaing your post";
				echo $conn->error;
			}
		}
		else{
			echo $conn->error;
		}
	}
			

}

?>