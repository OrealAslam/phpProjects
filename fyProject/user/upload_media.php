<?php 
session_start();
date_default_timezone_set('Asia/Karachi');

if (!isset($_SESSION['USEREMAIL'])) {
	echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{
include '../config.php';
	if (isset($_FILES['postamedia']['name'])){
		if(isset($_POST['mediaText'])){
			$txt = mysqli_real_escape_string($conn, $_POST['mediaText']);
		}
		$time =  date('g:i:s');
		$date = date('d-M-y');
		$status = 0;

		$filename 			= time() . $_FILES['postamedia']['name'];
		$size    			= $_FILES['postamedia']['size'];
		$filetype 			= $_FILES['postamedia']['type'];
		$temp_dir			= $_FILES['postamedia']['tmp_name'];
		$upload_directory   = "media/".$filename;
		$ext     			= pathinfo($filename, PATHINFO_EXTENSION);
		if($ext=='png' OR $ext=='jpg' OR $ext=='jpeg'){

			$upload_directory   = "media/img/".$filename;
			$upload = move_uploaded_file($temp_dir, $upload_directory);
			// now store post in DB
			if ($upload){
				$sql = "INSERT INTO userpost (user_id, postText, postImg, postdate, posttime, status) VALUES (?,?,?,?,?,?)";
				$stmt = $conn->prepare($sql);
				if ($stmt){
					$stmt->bind_param('issssi', $_SESSION['UID'], $txt, $upload_directory, $date, $time, $status);
					if ($stmt->execute()){	
						echo "Image posted successfully!!";
					}
					else{
						echo "error!! while posting your image";
					}
				}
				else{
					echo $conn->error;
				}
			}

		}
		elseif ($ext=='mp4' OR $ext=='webm'){
			$upload_directory   = "media/vid/".$filename;
			$upload = move_uploaded_file($temp_dir, $upload_directory);
			// now store post in DB
			if ($upload){
				$sql = "INSERT INTO userpost (user_id, postText, postVid, postdate, posttime, status) VALUES (?,?,?,?,?,?)";
				$stmt = $conn->prepare($sql);
				if ($stmt){
					$stmt->bind_param('issssi', $_SESSION['UID'], $txt, $upload_directory, $date, $time, $status);
					if ($stmt->execute()){	
						echo "Video posted successfully!!";
					}
					else{
						// echo "error!! while posting your video";
						echo $conn->error;
					}
				}
				else{
					echo $conn->error;
				}
			}

		}
		else{
			echo "<script>alert('Format not supported You can only upload images / video files');</script>";
		}
	}
}

?>