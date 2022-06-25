<!-- update query goes here -->

<?php 
// session_start();
// if (isset($_POST[''])){
	
// 	$filename 			= $_FILES['myfile']['name'];
// 	$size    			= $_FILES['myfile']['size'];
// 	$filetype 			= $_FILES['myfile']['type'];
// 	$temp_dir			= $_FILES['myfile']['tmp_name'];
// 	$upload_directory   = "thumbnail/".$filename;
	// restrict user to upload images only		//HERE WE GET FILE EXTENSION
	// $extension 			= pathinfo($filename, PATHINFO_EXTENSION);
	// if($extension=='png' OR $extension=='jpg' OR $extension=='jpeg' OR $extension=='gif'){
		// This will move the file in the directory
		// $upload = move_uploaded_file($temp_dir, $upload_directory);
		// if the file is successfully uploaded in directory now it is the time to upload it in the database
// 		if($upload){
// 			require '../connection.php';
// 			$sql  = "UPDATE course_details SET avatar =?,avatar_source=?WHERE id ={$id} ";
// 				$stmt = $conn->prepare($sql);
// 				if($stmt){
// 					$stmt->bind_param('ss', $filename, $upload_directory);
// 					$saved = $stmt->execute();
// 					// if file info saved on DB
// 					if($saved){
// 						$conn->close();
// 						$msg = "<div class='alert alert-success text-center text-capitalize'>thumbnail updated</div>";					
// 					}
// 					// if file info not stored in DB
// 					else{
// 						 agr tw folder ma file upload ho gai lakn DB ma nai hoi tw upoad_durectory waly folder sy bhoi file ko delete kr dyn gy	
// 						$conn->close();		
// 							if(file_exists($upload_directory)){
// 								unlink($upload_directory);
// 							}
// 					}
// 				}
// 				else{
// 					$msg = "<div class='alert alert-warning text-center text-capitalize'>request forebidden</div>";
// 				}
// 		}
// 		else{
// 			$msg = "<div class='alert alert-danger text-center text-capitalize'>unable to upload thumbnail in folder</div>";
// 		}

// 	}
// 	else{
// 		$msg = "<div class='alert alert-warning text-center text-capitalize'>all fields required</div>";
// 	}
// }

?>