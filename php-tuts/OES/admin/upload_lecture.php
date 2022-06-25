<?php 
session_start();
define('TITLE', 'Admin / Upload Lecture');
define('PAGE', 'Add Lecture');
include 'include/header.php';
require '../connection.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
	require '../connection.php';
?>

<?php 
if (isset($_GET['upload_lect'])){
	if(isset($_GET['hidden_id']) && isset($_POST['course_name'])){
		$course_id = $_GET['hidden_id'];
		$course_name = $_GET['course_name'];
	}
}
if (isset($_POST['upload'])){

	if (($_POST['course_id'] == "") || ($_POST['course_name'] == "") || ($_POST['lect_no'] == "") || ($_POST['lect_name'] == "") || ($_FILES['lecture_file'] == "") || ($_POST['time'] == "")){

		$msg = "<div class='alert alert-warning text-center text-capitalize'>all fields required</div>";
	}
	date_default_timezone_set('Asia/Karachi');
	$time 		 = date('h:i:sa');
	$lect_no     = trim(mysqli_real_escape_string($conn, $_POST['lect_no']));
	$lect_name   = trim(mysqli_real_escape_string($conn, $_POST['lect_name']));
	$course_id   = mysqli_real_escape_string($conn, $_GET['hidden_id']);
	$course_name = mysqli_real_escape_string($conn, $_GET['course_name']);

		$lectname 			= $_FILES['lecture_file']['name'];
		$lectsize    		= $_FILES['lecture_file']['size'];
		$filetype 			= $_FILES['lecture_file']['type'];
		$temp_dir			= $_FILES['lecture_file']['tmp_name'];
		$upload_directory   = "lectures/".$lectname;
		// restrict user to upload images only		//HERE WE GET FILE EXTENSION
		$extension 	 		= pathinfo($lectname, PATHINFO_EXTENSION);
		if($extension == 'mp4' OR $extension == 'webm' OR $extension =='avi' OR $extension =='mkv' OR $extension=='flv' OR $extension=='avchd'){
			// This will move the file in the directory

			$upload = move_uploaded_file($temp_dir, $upload_directory);
			
			if ($upload){
				// now its time to save lecture info in DB
				$sql = "INSERT INTO course_lecture (course_id, course_name, lect_number, lect_name, lect_source, `time`) VALUES ('".$course_id."', '".$course_name."', '$lect_no', '$lect_name', '$upload_directory', '$time')";

				$result = $conn->query($sql);
				
				if ($result){
					$conn->close();
					$msg = "<div class='alert alert-success text-center text-capitalize'>lecture has been uploaded successfully!!</div>";
				}
				else{
					if (file_exists($upload_directory)){
						unlink($upload_directory);
						$conn->close();
						$msg = "<div class='alert alert-danger text-center text-capitalize'>error occur while uploading lecture</div>";
					}
				}
			}
			else{
				$msg = "<div class='alert alert-danger text-center text-capitalize'>unable to upload lecture in directory</div>";
			}
		}
		else{
			$msg = "<div class='alert alert-info text-center text-capitalize'>not a video file</div>";
		}		
}

?>



<div class="col-md-9 col-lg-10 my-5">
	<h4 class="text-center text-danger">Upload Lecture</h4>
	<div class="row justify-content-center my-4">		
		<div class="col-lg-4 col-md-6 col-sm-8">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

				<div class="form-group">
					<label for="id">Course ID</label>
					<input type="text" class="form-control" name="course_id" value="<?php if(isset($_GET['hidden_id'])){echo $_GET['hidden_id'];} ?>" id="id" readonly>
				</div>

				<div class="form-group">
					<label for="name">Course Name</label>
					<input type="text" class="form-control" name="course_name" value="<?php if(isset($_GET['course_name'])){echo $_GET['course_name'];} ?>" id="name" readonly>
				</div>

				<div class="form-group">
					<label for="lect_no">Lecture Number</label>

					<input type="text" class="form-control" name="lect_no" value="<?php if(isset($_GET['recent_lect'])){echo $_GET['recent_lect'] + 1;} ?>" id="lect_no" readonly>
				</div>

				<div class="form-group">
					<label for="lect_name">Lecture Name</label>
					<input type="text" class="form-control" name="lect_name" id="lect_name">
				</div>
				<div class="form-group">	
					<label for="time">Time</label>				
					<input type="time" class="form-control" id="time" name="time" required>
				</div>
				<div class="form-group">
					<label for="customFile">Upload Lecture</label>
					<input type="file" name="lecture_file" class="btn btn-primary" id="customFile" />
				</div>
				<button type="submit" class="btn btn-outline-warning btn-block" name="upload">Upload Lecture</button>
			</form>
		</div>
	</div>
	<?php if(isset($msg)){echo $msg;} ?>
</div>




<!-- dashboard column end -->
<!-- sidebar row & container div end -->
</div> 	
</div>

<?php 
}
include 'include/footer.php';
?>