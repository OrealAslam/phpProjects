<?php 
define('TITLE', 'Edit User');
define('PAGE', 'requester');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}
?>

<!-- Second Column starts -->
<?php 
include '../db_connection.php';
$sql = "SELECT * FROM requesterlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<?php
if(isset($_REQUEST['update'])){
	if(($_REQUEST['id'] == "") || ($_REQUEST['name'] == "") || ($_REQUEST['email'] == "")){
		$regmsg = "<div class='mt-3 alert alert-warning' role='alert'>All Fields Required</div>";
	}
		$rname = $_REQUEST['name'];
		$remail = $_REQUEST['email'];
		$sql = "UPDATE requesterlogin_tb SET r_name = '".$rname."', r_email = '".$remail."' WHERE r_login_id = {$_REQUEST['id']}";
		if($conn->query($sql) == true){
			$regmsg = "<div class='mt-3 alert alert-success text-capitalize' role='alert'>Profile updated successfully</div>";
		}
		else{
			$regmsg = "<div class='mt-3 alert alert-danger text-capitalize' role='alert'>something went wrong while updateding profile</div>";
		}
}
?>
<!-- Second Column start -->
<div class="jumbotron col-md-5 mx-5 mt-n1">
	<div class="mt-n5">
			<h3 class="text-center bg-dark text-white text-capitalize p-1">update requester details</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<label for="id">Requester ID</label>
			<div class="form-group">
				<input type="text" class="form-control" name="id" id="id" value="<?php if(isset($row['r_login_id'])){echo $row['r_login_id'];} ?>" readonly>			
			</div>
			<label for="name">Name</label>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="name" value="<?php echo $row['r_name']; ?>">			
			</div>	
			<label for="email">Email</label>	
			<div class="form-group">
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['r_email'] ?>">	
			<div class="text-center">
				<button type="submit" class="btn btn-danger mt-3" name="update">Update</button>
				<a href="requester.php" class="btn btn-secondary mt-3" name="close">Close</a>
			</div>		
			<?php 
			if(isset($regmsg)){echo $regmsg;}?>
		</form>
	</div>
</div>
<!-- Second Column end -->




<?php 
include 'includes/footer.php';
?>