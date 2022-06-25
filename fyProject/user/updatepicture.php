<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{

	if (isset($_FILES['userimage']['name'])){
		
		$filename 			= time() .$_FILES['userimage']['name'];
		$size    			= $_FILES['userimage']['size'];
		$filetype 			= $_FILES['userimage']['type'];
		$temp_dir			= $_FILES['userimage']['tmp_name'];
		$upload_directory   = "profile_pic/".$filename;

		$ext     			= pathinfo($filename, PATHINFO_EXTENSION);
		if($ext=='png' OR $ext=='jpg' OR $ext=='jpeg' OR $ext=='gif'){

			$upload = move_uploaded_file($temp_dir, $upload_directory);
			// echo "<script>alert('File Uploaded');</script>";
			// echo "<script>window.location.href= 'http://localhost/FYProject/user/profile_setting.php';</script>";

			  include '../config.php';

			$sql  = "UPDATE users SET picture = ? WHERE email = '".$_SESSION['USEREMAIL']."' ";
			$stmt = $conn->prepare($sql);

			if ($stmt){
			  	$stmt->bind_param('s', $filename);
			  	if ($stmt->execute()){
			  		echo "<script>alert('Profile picture updated successfully');</script>";
					echo "<script>window.location.href= 'http://localhost/FYProject/user/profile_setting.php';</script>";
			  	}
			  	else{
			  		echo "<script>alert('Unable to upload your profile picture Retry later');</script>";
					echo "<script>window.location.href= 'http://localhost/FYProject/user/profile_setting.php';</script>";
			  	}
			}
		}
		else{
			echo "<script>alert('Not an image file');</script>";
			echo "<script>window.location.href= 'http://localhost/FYProject/user/profile_setting.php';</script>";
		}

	}

}


?>