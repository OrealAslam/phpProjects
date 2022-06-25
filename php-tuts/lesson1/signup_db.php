	<?php 
	// when user press File Upload button

	if (isset($_POST['btn'])) {
			
		$filename   = $_FILES['myfile']['name'];
		$filetype   = $_FILES['myfile']['type'];
		$temp_dir   = $_FILES['myfile']['tmp_name'];
		$error      = $_FILES['myfile']['error'];
		$filesize   = $_FILES['myfile']['size'];
		$upload_dir = "upload_images/" . $filename;

		$ext		= pathinfo($filename, PATHINFO_EXTENSION);
	// Restrict user to upload images only

		if ($ext == 'jpg' OR $ext == 'jpeg' OR $ext == 'png' OR $ext == 'gif' OR $ext == 'jfif') {
			
			$uploaded = move_uploaded_file($temp_dir, $upload_dir);

			if ($uploaded) {
				
				$connection = mysqli_connect("localhost", "root", "", "file_upload");

				if(mysqli_connect_errno()){

					die(mysqli_connect_error());
				}

			else{

					$sql = "INSERT INTO `uploading`(`file_name`, `file_source`) VALUES(?,?)";
					$stmt = mysqli_prepare($connection, $sql);

					if ($stmt) {

						
						mysqli_stmt_bind_param($stmt, 'ss', $filename, $upload_dir);

						  $saved = mysqli_stmt_execute($stmt);

						  if ($saved){
						  	 	header("Location: signup_form.php?success=File Uploaded successfully!!");			  	 
						  	 	
						  }

						  else{
						  	if (file_exists($upload_dir)) {
						  		unlink($upload_dir);
						  	}
						  	header("refresh:2; url=signup_form.php?error= Error:Unable to store info in DB");
						  }

					}

					else{

						header("Location: signup_form.php?error=Error: Statement didn't prepare");
					}
				}

			}
			else{

					header("refresh:3; url=signup_form.php?error= Error:Unable to upload file in folder");
				}
			
		}else{
			header("Location: signup_form.php?error= Error:Format not supported");
			echo "This file is not supported";
		}
			
		
	}	

	?>