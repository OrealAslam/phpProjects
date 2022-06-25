<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
	<link rel="stylesheet" type="text/css" href="css//img-style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,600;1,800&display=swap" rel="stylesheet">
</head>
<body>
	<div id="form-wrapper">
		<div id="parent-div">
			<h3>Upload an image</h3>
			<form method="POST" action="upload_image.php" enctype="multipart/form-data">
				<input type="file" name="myfile"><br>
				<button type="submit" name="upload">Upload Photo</button>		
			</form>
		</div>
	</div>
</body>
</html>
<?php 
session_start();
	if (isset($_POST['upload'])) {
		$filename = $_FILES['myfile']['name'];
		$filetype = $_FILES['myfile']['type'];
		$temp_name = $_FILES['myfile']['tmp_name'];
		$filesize  = $_FILES['myfile']['size'];
		$directory = "upload/".$filename;

		$ext       = pathinfo($filename, PATHINFO_EXTENSION);
		if ($ext == 'gif' OR $ext == 'jfif' OR $ext == 'jpg' OR $ext == 'jpeg'){
			$upload = move_uploaded_file($temp_name, $directory);
			if ($upload){
				$connection = mysqli_connect("localhost", "root", "", "lms system");
				if (mysqli_connect_errno()){
					die(mysqli_connect_error());
				}
				$sql = "INSERT INTO `profile_photo`(`file_name`, `location`) VALUES (?,?)";
				$stmt = mysqli_prepare($connection, $sql);
				if ($stmt){
					mysqli_stmt_bind_param($stmt, 'ss', $filename, $directory);
					$saved = mysqli_stmt_execute($stmt);
					if ($saved){
						header("Location: login.php");
					}
					else{
						if (file_exists($directory)){
							unlink($directory);
						}
					}
				}
				else{
					echo "Unable to upload file in DB";
				}
		 	}
		 	else{
		 		echo "not uploaded";
		 	}			
		}
		else{
			echo "Its not an image file";
		}
	}
?>