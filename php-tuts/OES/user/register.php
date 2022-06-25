<?php 
define('TITLE', 'Create Account');
session_start();

if (!isset($_SESSION['userlogin'])){

include 'include/header.php';
require '../connection.php';
	// Registration Code
	if (isset($_POST['register']) && isset($_FILES['userimg'])){

		$username 	  = mysqli_real_escape_string($conn, $_POST['username']);
		$useremail    = mysqli_real_escape_string($conn, $_POST['useremail']);
		$userpassword = mysqli_real_escape_string($conn, $_POST['userpassword']);
		$userpassword = password_hash($userpassword, PASSWORD_DEFAULT);
		$gender 	  = mysqli_real_escape_string($conn, $_POST['gender']);
		$usermobile	  = mysqli_real_escape_string($conn, $_POST['usermobile']);

		// checking missing input fields

		if(($_POST['username'] == "") || ($_POST['useremail'] == "") || ($_POST['userpassword'] == "") || ($_POST['gender'] == "") ||($_POST['usermobile'] == "") || ($_FILES['userimg'] == "")){
			$msg = "<div class='alert alert-warning text-center text-capitalize' role='alert'>all fields required</div>";
		}
		elseif (!filter_var($useremail, FILTER_VALIDATE_EMAIL)){
			$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>INVALID EMAIL</div>";
		}
		else{
			$useremail = filter_var($useremail, FILTER_SANITIZE_EMAIL);

			//PROFILE PHOTO INFO
			
				$file_name = $_FILES["userimg"]["name"];
				$file_type = $_FILES["userimg"]["type"];
				$file_size = $_FILES["userimg"]["size"];
				$temp_dir  = $_FILES["userimg"]["tmp_name"];

				$upload_folder = "uploads/". $file_name;
				$ext           = pathinfo($file_name, PATHINFO_EXTENSION);

				if($ext =='png' OR $ext =='jpg' OR $ext =='jpeg' OR $ext =='gif'){
					// This will move the file in the directory
					$upload = move_uploaded_file($temp_dir, $upload_folder);
					
					if($upload){
						$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>uploaded</div>";
						 $sql = "INSERT INTO user_login (username, email, password, picture, pic_source, phone, gender) VALUES (?,?,?,?,?,?,?)";
						$stmt = $conn->prepare($sql);
						if($stmt){
							$stmt->bind_param('sssssis', $username, $useremail, $userpassword, $file_name, $upload_folder, $usermobile, $gender);
						 	$execute = $stmt->execute();

						 	if ($execute){
						 		$stmt->close();
								$msg = "<div class='alert alert-success text-center text-capitalize' role='alert'>registered successfully</div>";
							}
						 	else{
						 		$stmt->close();
						 		$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>email already exists</div>";
						 	}
						}
						else{
							$stmt->close();
						 	$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>unable to prepare statement</div>";
						}
					}
					else{
							
							$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>unable to upload file in folder</div>";
					
					}
				}
				else{
					$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>not an image file</div>";
				}	
		}
				
	}
}
else{
	echo "<script>location.href='userdashboard.php'</script>";
}
?>

<div class="container" style="background-color: #4d4dff;">	
	<div class="row justify-content-center align-items-between py-0">
		<!-- column 1 start -->

		<div class="col-md-5 col-12 jumbotron shadow-lg mt-4">
			<h4 class="text-right mt-n5" style="color:  #000099;">Register Yourself</h4>
			<form method="POST" class="mb-n2" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label for="username"><i class="fas fa-user"></i> Username</label>
					<input type="text" class="form-control" name="username" id="username">
				</div>
				<div class="form-group">
					<label for="useremail"><i class="fas fa-envelope"></i> Email</label>
					<input type="email" class="form-control" name="useremail" id="useremail">
				</div>
				<div class="form-group">
					<label for="password"><i class="fas fa-key"></i> Password</label>
					<input type="password" class="form-control" name="userpassword" id="password">
				</div>
				<div class="form-group">
					<label for="mobile"><i class="fas fa-mobile-alt"></i> Mobile</label>
					<input type="text" class="form-control" name="usermobile" id="mobile">
				</div>
				<div class="form-group">
					<h5>Gender</h5>
					 <label class="radio-inline">
				      <input type="radio" name="gender" value="male" checked> Male
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="gender" value="female"> Female
				    </label>
				    <label class="radio-inline">
				      <input type="radio" name="gender" value="others"> Other
				    </label>
				</div>
				<div class="form-row">
					<label>Profile Image</label>
					<input type="file" class="btn btn-info" name="userimg">
				</div>
			<div class="btn-group btn-block mb-3">
				<a href="login.php" class="btn btn-outline-danger float-right mt-2">Already Member</a>
				<button type="submit" class="btn btn-outline-primary float-right mt-2" name="register">Register</button>
			</div>
			<!-- error or div -->
			<div class="">
				<div><?php if(isset($msg)){echo $msg;} ?></div>
			</div>
			</form>
		</div>
	</div>
</div>




<!-- footer included -->
<?php
include 'include/footer.php';
?>