<?php
define('TITLE', 'User Dashboard');
define('PAGE', 'Profile');

session_start();
include 'include/header.php';
if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}

// image upload code

if (isset($_POST['imgupload'])){
	$email = $_SESSION['userlogin']['useremail'];
	$filename 			= $_FILES['myfile']['name'];
	$size    			= $_FILES['myfile']['size'];
	$filetype 			= $_FILES['myfile']['type'];
	$temp_dir			= $_FILES['myfile']['tmp_name'];
	$upload_directory   = "uploads/".$filename;

	// restrict user to upload images only		//HERE WE GET FILE EXTENSION

	$extension 			= pathinfo($filename, PATHINFO_EXTENSION);
	if($extension=='png' OR $extension=='jpg' OR $extension=='jpeg' OR $extension=='gif'){
		// This will move the file in the directory
		$upload = move_uploaded_file($temp_dir, $upload_directory);
		
		if ($upload){
			// DB code goes here
			require '../connection.php';

			$sql = "UPDATE user_login SET picture = '$filename', pic_source = '$upload_directory' WHERE email ='".$email."'";
			$result = $conn->query($sql);
			if ($result){
				$conn->close();
				$msg = "<div class='alert alert-success text-center text-capitalize my-3' role='alert'>Profile pic updated!!!!<div>";
			}
			else{
				if (file_exists($upload_directory)){
					unlink($upload_directory);
					$msg = "<div class='alert alert-danger text-center text-capitalize my-3' role='alert'>invalid objcet!!<div>";
				}
			}
		}			
	}		
		
}

?>

<!-- upload image section start -->
<div class="container my-5">
	<h3 class="text-center text-capitalize my-3 d-block">File Upload</h3>
	<div class="row justify-content-center py-3">
		
		<div class="col-md-6">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					<input type="file" class="btn btn-danger d-block my-4" name="myfile" multiple>
					<button type="submit" class="btn btn-warning" name="imgupload">Upload</button>

					<a href="userprofile.php" class="btn btn-primary">Back</a>
			</form>
			<?php if(isset($msg)){echo $msg;} ?>
		</div>
	</div>
</div>
<!-- upload image section end -->


<!-- footer included -->
<?php
include 'include/footer.php';
?>