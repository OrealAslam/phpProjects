<?php 

if(isset($_POST['proceed'])){
	// These information of file is mandatory
	$filename 			= $_FILES['myfile']['name'];
	$size    			= $_FILES['myfile']['size'];
	$filetype 			= $_FILES['myfile']['type'];
	$temp_dir			= $_FILES['myfile']['tmp_name'];
	$upload_directory   = "upload_images/".$filename;
	// restrict user to upload images only		//HERE WE GET FILE EXTENSION
	$extension 			= pathinfo($filename, PATHINFO_EXTENSION);
	if($extension=='png' OR $extension=='jpg' OR $extension=='jpeg' OR $extension=='gif'){
		// This will move the file in the directory
		$upload = move_uploaded_file($temp_dir, $upload_directory);
		// if the file is successfully uploaded in directory now it is the time to upload it in the database
		if($upload){
			$connection = mysqli_connect("localhost", "root", "", "file_upload");
			if (mysqli_connect_errno()) {
					die(mysqli_connect_error());
			}
			else{
				$sql  = "INSERT INTO `uploading`(`file_name`, `file_source`) VALUES(?,?)";
				$stmt = mysqli_prepare($connection, $sql);
				if($stmt){
					mysqli_stmt_bind_param($stmt, 'ss', $filename, $upload_directory );
					$saved = mysqli_stmt_execute($stmt);
					// if file info saved on DB
					if($saved){
						echo "File has been uploaded";
						
					}
					// if file info not stored in DB
					else{
						/* agr tw folder ma file upload ho gai lakn DB ma nai hoi tw upoad_durectory waly folder sy bhoi file ko delete kr dyn gy*/			
							if(file_exists($upload_directory)){
								unlink($upload_directory);
							}
					}
				}else{
					echo "Error to prepare statement";
				}
			}

		}
		else{
			echo "Failed to upload a file in directory";
		}
	}else {
		echo "U r not able to signin without uploading your profile picture";
	}
	
}
else{
	echo "You cannot access without submitting the form";
}
// This function is used for redirection
//header("Locaton:file_upload.php?error=Error: Please upload the file");

?> 