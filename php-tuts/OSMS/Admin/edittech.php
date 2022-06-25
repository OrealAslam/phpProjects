<?php 
define('TITLE', 'Edit Technician');
define('PAGE', 'technician');
session_start();
include 'includes/header.php';
	
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}
?>

<?php 
include '../db_connection.php';
$tid = $_REQUEST['id'];
$sql = "SELECT * FROM technician_tb WHERE tech_id = {$_REQUEST['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$tname = $row['tech_name'];
$temail = $row['tech_email'];
$tcity = $row['tech_name'];
$tmobile = $row['tech_mobile'];
?>

<?php
if(isset($_REQUEST['update'])){
	$tname = $_REQUEST['name'];
	$temail = $_REQUEST['email'];	
	$tcity = $_REQUEST['city'];	
	$tmobile = $_REQUEST['mobile'];	

	if(($tid == "") || ($tname == "") || ($temail == "") || ($tcity == "") || ($tmobile == "")){
		$regmsg = "<div class='mt-3 alert alert-warning' role='alert'>All Fields Required</div>";
	}
	else{
		$sql = "UPDATE technician_tb SET tech_name = '".$tname."', tech_email = '".$temail."', tech_city = '".$tcity."', tech_mobile = '".$tmobile."' WHERE tech_id = {$_REQUEST['id']}";
		if($conn->query($sql) == true){
			$regmsg = "<div class='mt-3 alert alert-success text-capitalize' role='alert'>Profile updated successfully</div>";
		}
		else{
			$regmsg = "<div class='mt-3 alert alert-danger text-capitalize' role='alert'>something went wrong while updating profile</div>";
		}
	}	
}

?>
<!-- Second Column start -->
<div class="jumbotron col-md-5 mx-5 mt-n1">
	<div class="mt-n5">
			<h3 class="text-center bg-dark text-white text-capitalize p-1">update Technician details</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<label for="id">Requester ID</label>
			<div class="form-group">
				<input type="text" class="form-control" name="id" id="id" value="<?php if(isset($tid)){echo $tid;} ?>" readonly>			
			</div>

			<label for="name">Name</label>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="name" value="<?php echo $tname; ?>">			
			</div>	

			<label for="email">Email</label>	
			<div class="form-group">
				<input type="email" class="form-control" id="email" name="email" value="<?php if(isset($temail)){echo $temail;} ?>">	
			</div>
				
				<label for="city">City</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="city" name="city" value="<?php if(isset($tcity)){echo $tcity;} ?>">	
			</div>

			<label for="mobile">Mobile</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="mobile" name="mobile" value="<?php if(isset($tmobile)){echo $tmobile;} ?>" onkeypress="isInputNumber(event)">	
			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-danger mt-3" name="update">Update</button>
				<a href="technician.php" class="btn btn-secondary mt-3" name="close">Close</a>
			</div>		
			<?php 
			if(isset($regmsg)){echo $regmsg;}?>
		</form>
	</div>
</div>
<!-- Second Column end -->

<script>
	function isInputNumber(evt){
		var ch = String.fromCharCode(evt.which);
			if(!(/[0-9]/.test(ch))){
				evt.preventDefault();
			}
	}
</script>



<?php 
include 'includes/footer.php';
?>