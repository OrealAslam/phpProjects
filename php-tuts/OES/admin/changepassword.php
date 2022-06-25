<?php 
session_start();
define('TITLE', 'Admin / Change Password');
define('PAGE', 'Password');
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
	if (isset($_POST['changepass'])){

		$old_pass = mysqli_real_escape_string($conn, $_POST['oldpass']);
		$new_pass = mysqli_real_escape_string($conn, $_POST['new-pass']);
		$con_pass = mysqli_real_escape_string($conn, $_POST['confirm-pass']);


		if (($_POST['oldpass'] == "") || ($_POST['new-pass'] == "") || ($_POST['confirm-pass'] == "")){
			$msg = "<div class='p-0 alert alert-warning text-center text-capitalize'>empty fields</div>";
		}
		elseif(($new_pass) !== ($con_pass)){

			$msg = "<div class='p-0 alert alert-info text-center'>New and Confirm new password must be same</div>";
		}
		else{

			$sql = "SELECT password FROM admin_login WHERE email = '".$_SESSION['admin']['email']."' ";
			$result = $conn->query($sql);
			if ($result->num_rows == 1){
				$adminpass = $result->fetch_assoc();

				if (($old_pass) !== ($adminpass['password'])){
					$msg = "<div class='p-0 alert alert-danger text-center text-capitalize'>invalid old password</div>";
				}
				else{
					$sql = "UPDATE admin_login SET password = ? WHERE email = '".$_SESSION['admin']['email']."' ";
					$stmt = $conn->prepare($sql);

					if ($stmt){
						$stmt->bind_param('s', $con_pass);
						$execute = $stmt->execute();

						if ($execute){
							$stmt->close();
							$msg = "<div class='p-0 alert alert-success text-center'>Password Updated Successfully!!!</div>";
						}
						else{
							$stmt->close();
							$msg = "<div class='p-0 alert alert-danger text-center'>something went wrong while updating password</div>";
						}
					}
					else{
						$msg = "<div class='p-0 alert alert-danger text-center text-capitalize'>request forebidden</div>";
					}
				}
			}
		}
	}
?>

<div class="col-lg-10 col-md-9 py-1">
	<h4 class="text-center text-capitalize my-sm-3 mb-md-0 mb--3 text-danger">Change Password</h4>
		<form method="POST" action="" class="col-lg-4 offset-md-4 my-4">
			<div class="form-group">
				<label for="old"><i class="fas fa-key mr-2"></i>Enter Old Password</label>
				<input type="password" class="form-control" name="oldpass" id="old">
			</div>

			<div class="form-group">
				<label for="new"><i class="fas fa-unlock-alt mr-2"></i>Enter New Password</label>
				<input type="password" class="form-control" name="new-pass" id="new">
			</div>

			<div class="form-group">
				<label for="cnew"><i class="fas fa-unlock mr-2"></i>Confirm Password</label>
				<input type="password" class="form-control" name="confirm-pass" id="cnew">
			</div>
			<small>Not share your password with anyone</small><br><br>
			<div class="btn-group btn-block">
				<button type="submit" name="changepass" class="btn btn-outline-danger">Change Password</button>
				<button type="reset" class="btn btn-outline-primary">Reset</button>
			</div>
		</form>
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