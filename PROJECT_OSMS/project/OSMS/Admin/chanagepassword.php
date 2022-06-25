	<?php 
	define('TITLE', 'Change Password');
	define('PAGE', 'chanagepassword');
	session_start();
	include 'includes/header.php';
		
		if(!isset($_SESSION['aLogin'])){
			echo "<script>location.href='adminlogin.php'</script>";
		}

		if (isset($_REQUEST['passwordupdate'])){
			if (($_REQUEST['old-password'] == "") || ($_REQUEST['new-password'] == "")){
				$regmsg = "<div class='alert alert-warning mt-3 border-dark' role='alert'>All fields required</div>";
			}
			else{
			
				$old_password = $_REQUEST['old-password'];
				//checking old password from DB
				check_old_pass();
				if($old_password !== check_old_pass()){
					$regmsg = "<div class='alert alert-danger mt-3' role='alert'>Invalid Old Password</div>";
				}
				else{			
					include '../db_connection.php';
					$sql = "UPDATE adminlogin_tb SET `a_password` = '".$_REQUEST['new-password']."' WHERE `a_email`= '".$_SESSION['aLogin']['aEmail']."'";
					if($result = $conn->query($sql)){
						$regmsg = "<div class='alert alert-success mt-3' role='alert'>Password updated successfully</div>";
					}
					else{
						$regmsg = "<div class='alert alert-danger mt-3' role='alert'>Something went wrong while updating your password</div>";
					}
				}
				
			}
		}

	?>

	<div class="col-sm-9 col-md-7"> <!-- Start change password column(2nd)-->
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="form-group">
					<label for="rEmail">Email</label>
					<input type="email" class="form-control" name="rEmail" value="<?php echo $_SESSION['aLogin']['aEmail']; ?>" readonly>
				</div>

				<div class="form-group">
					<label for="Password">Old Password</label>
					<input type="password" name="old-password" id="Password" class="form-control">
				</div>	

				<div class="form-group">
					<label for="new-password">New Password</label>
					<input type="password" name="new-password" id="new-password" class="form-control">
				</div>		
				<button type="submit" name="passwordupdate" class="btn btn-danger mr-5">Update</button>
				<button type="reset" class="btn btn-secondary">Reset</button>
				<?php if(isset($regmsg)){echo $regmsg;} ?>
			</form>
		</div> <!-- End change password column(2nd)-->


	<?php 
	function check_old_pass(){
				include '../db_connection.php';
			$sql = "SELECT a_password FROM adminlogin_tb WHERE a_email = '".$_SESSION['aLogin']['aEmail']."' ";
			$result = $conn->query($sql);
			if ($result->num_rows == 1){
				$row = $result->fetch_assoc();
				$verify = $row['a_password'];
				return $verify;
			}
		}
	include 'includes/footer.php';
		
	?>