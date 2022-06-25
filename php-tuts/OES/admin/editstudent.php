<?php 
session_start();
define('TITLE', 'Admin / Students / Edit Student');
define('PAGE', 'Students');
include 'include/header.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
?>

<?php 

if (isset($_POST['email'])){
	require '../connection.php';
	$email = trim(mysqli_real_escape_string($conn, $_POST['email']));
	$sql = "SELECT `username`, `email`, `phone` FROM user_login WHERE email = '".$email."' ";
	$result = $conn->query($sql);

	if ($result->num_rows == 1){
		$data = $result->fetch_assoc();
	}
}

	if (isset($_POST['updatestudent'])){

		if (($_POST['UserName'] == "") || ($_POST['UserEmail'] == "") || ($_POST['ContactNo'] == "")){
		$msg = "<div class='alert alert-warning text-center text-capitalize'>all fields required</div>";
		}
		else{
			require '../connection.php';
			$studentname = trim(mysqli_real_escape_string($conn, $_POST['UserName']));
			$studentemail = trim(mysqli_real_escape_string($conn, $_POST['UserEmail']));
			$studentcontact = trim(mysqli_real_escape_string($conn, $_POST['ContactNo']));

			$sql = "UPDATE user_login SET username = ?, phone = ? WHERE email = '".$studentemail."' ";
			$stmt = $conn->prepare($sql);

			if ($stmt){
				$stmt->bind_param('si', $studentname, $studentcontact);
				$exe = $stmt->execute();

				if ($exe){
					$stmt->close();
					$msg = "<div class='alert alert-warning text-center text-capitalize'>user data updated</div>";
				}
			}
			else{
				$stmt->close();
				$msg = "<div class='alert alert-warning text-center text-capitalize'>Admin Request forebidden</div>";
			}
		}
	}

?>
<div class="col-lg-10 col-md-9 my-3">
	<h3 class="text-center bg-primary w-100 py-1 text-white text-capitalize">Edit Student Details</h3>
	<div class="row justify-content-center px-3 jumbotron p-1">
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<div class="form-inline my-3 mb-5">
			<input type="text" class="form-control mr-5 mb-md-2 mb-3" name="UserName" value ="<?php if(isset($data['username'])){echo $data['username'];} ?>" placeholder="username">
			
			<input type="email" class="form-control mr-5 mb-md-2 mb-3" name="UserEmail" value="<?php if(isset($data['email'])){echo $data['email'];} ?>" placeholder="email" readonly>

			<input type="text" class="form-control mr-5 mb-md-2 mb-3" name="ContactNo" value="<?php if(isset($data['phone'])){echo $data['phone'];} ?>" placeholder="Ph number">
		</div>
		<?php if(isset($msg)){echo $msg;} ?>
		<div class="btn-group py-3 float-sm-right">
			<button type="submit" class="btn btn-outline-danger" name="updatestudent">Update Student</button>
			<a href="handlestudents.php" class="btn btn-outline-primary" name="updatestudent">Back</a>
		</div>
	</form>

</div>
</div>



<!-- dashboard column end -->
<!-- sidebar row & container div end -->
</div> 	
</div>

<?php 
}
include 'include/footer.php';
?>