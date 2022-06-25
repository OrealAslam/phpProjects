<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
	echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{
	include '../config.php';
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$post_id = mysqli_real_escape_string($conn, $_POST['id']);
	$user_id = $_SESSION['UID'];

	$post_id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
	if(!$post_id){die();}

	if (isset($_POST['type']) AND isset($_POST['id']) AND $_POST['type'] == 'like'){
		$post_id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
		if(!$post_id){die();}

		$sql = "SELECT * FROM rating_info WHERE post_id = '$post_id' AND  user_id = '$user_id' AND rating_action = 'like'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			$sql = "DELETE FROM rating_info WHERE post_id = '$post_id' AND  user_id = '$user_id' AND rating_action = 'like'";
			$result = $conn->query($sql);
		}
		else{
			$sql = "INSERT INTO rating_info (user_id, post_id, rating_action) VALUES ('$user_id', '$post_id', 'like')";
			$result = $conn->query($sql);
		}
	}


// if user dislike the post

	if (isset($_POST['type']) AND isset($_POST['id']) AND $_POST['type'] == 'dislike'){
		$post_id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
		if(!$post_id){die();}

		$sql = "SELECT * FROM rating_info WHERE post_id = '$post_id' AND  user_id = '$user_id' AND rating_action = 'dislike'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			$sql = "DELETE FROM rating_info WHERE post_id = '$post_id' AND  user_id = '$user_id' AND rating_action = 'dislike'";
			$result = $conn->query($sql);
		}
		else{
			$sql = "INSERT INTO rating_info (user_id, post_id, rating_action) VALUES ('$user_id', '$post_id', 'dislike')";
			$result = $conn->query($sql);
		}
	}
	
}


?>
