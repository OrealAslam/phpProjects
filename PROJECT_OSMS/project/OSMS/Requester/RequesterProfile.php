<?php 


define('TITLE', 'Requester Profile');
define('PAGE', 'RequesterProfile');
include 'include/header.php';
include '../db_connection.php';
	session_start();
	if ($_SESSION['login']['rEmail']){
		$rEmail = $_SESSION['login']['rEmail'];
	}
	else{
		echo "<script>location.href= 'RequesterLogin.php'</script>";
	}
		$sql="SELECT r_name, r_email FROM requesterlogin_tb WHERE r_email ='".$rEmail."' limit 1";
		$result = $conn->query($sql);
		if ($result->num_rows == 1){
			$row = $result->fetch_assoc();
			$rName = $row['r_name'];
			$rEmail = $row['r_email'];
		}

	if (isset($_REQUEST['update'])){
		if ($_REQUEST['rName'] == "") {
			$regmsg = '<div class="alert alert-warning col-sm-6"role="alert">Name Field cannot be empty</div>';
		}
		else{
			$new_name = $_REQUEST['rName'];
			$sql = "UPDATE `requesterlogin_tb` SET `r_name`='".$new_name."' WHERE `r_email`= '".$_SESSION['login']['rEmail']."' ";
			if($conn->query($sql) == true){
				$regmsg = '<div class="alert alert-success col-sm-6"role="alert">Name updated Successfully..!!</div>';
			}
			else{
				$regmsg = '<div class="alert alert-danger col-sm-6"role="alert">Error while updating your Info.</div>';
			}
		}
	}
?>



			<div class="col-sm-6 mt-5"> <!-- Column 2nd Profile Area-->
				<form action="" method="POST" class="mx-5">
					<div class="form-group">
						<label for="rEmail">Email</label>
						<input type="email" class="form-control" name="rEmail" value="<?php echo $_SESSION['login']['rEmail']; ?>" readonly>
					</div>
					<div class="form-group">
						<label for="rName">Name</label>
						<input type="text" name="rName" class="form-control" placeholder="Update your name" value="<?php if(isset($rName)){echo $rName;}?>">
					</div>
					<button type="submit" name="update" class="btn btn-danger">Update</button>
					<?php if (isset($regmsg)){echo $regmsg;} ?>
				</form>
			</div>  <!-- Column 2nd ends Profile Area Ends-->

<?php 
	include 'include/footer.php';
?>
