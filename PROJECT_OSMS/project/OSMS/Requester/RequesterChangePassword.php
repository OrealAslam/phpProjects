<?php 

/*
User can change his/her account password
*/
	session_start();
	if (!$_SESSION['login']['rEmail']){
		echo "<script>location.href= 'RequesterLogin.php'</script>";
	}
	define('TITLE', 'Change Password');
	define('PAGE', 'RequesterChangePassword');
	include 'include/header.php';

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
				$sql = "UPDATE requesterlogin_tb SET `r_password` = '".$_REQUEST['new-password']."' WHERE `r_email`= '".$_SESSION['login']['rEmail']."'";
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
				<input type="email" class="form-control" name="rEmail" value="<?php echo $_SESSION['login']['rEmail']; ?>" readonly>
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
	include 'include/footer.php';
?>


<?php 
	function check_old_pass(){
			include '../db_connection.php';
		$sql = "SELECT r_password FROM requesterlogin_tb WHERE r_email = '".$_SESSION['login']['rEmail']."' ";
		$result = $conn->query($sql);
		if ($result->num_rows == 1){
			$row = $result->fetch_assoc();
			$verify = $row['r_password'];
			return $verify;
		}
	}
?>
	
