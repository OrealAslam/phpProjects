<?php 
/*
User can track his / her service status by using his/her specific id which was given to himat the tmie when he/ she submit his request form

*/
session_start();
define('PAGE', 'Requesterservicestatus');
define('TITLE', 'Service Status');
	include 'include/header.php';
	if (!isset($_SESSION['login'])){
	echo"<script>location.href='RequesterLogin.php';</script>";
	}
?>
<!-- start second column (form)-->
<div class="col-sm-6">
	<form method="POST" class="form-inline d-print-none" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="form-group mr-3">
			<label for="id" class="mr-3">Requester ID :</label>
			<input type="text" class="form-control" value="<?php if(isset($_REQUEST['checkid'])){echo $_REQUEST['checkid'];} ?>" name="checkid" id="id" onkeypress="IsInputNumber(event)">
		</div>
		<button type="submit" class="btn btn-danger">Search</button>
	</form>
<!-- PHP code goes here -->

<?php 
	if(isset($_REQUEST['checkid'])){
		include '../db_connection.php';
		if (empty($_REQUEST['checkid'])){
			echo "<div class='alert alert-warning mt-3' role='alert'>ID can't be empty</div>";
			die();
		}
		if (!empty($_REQUEST['checkid'])){
			$sql = "SELECT `request_id` FROM `assignwork_tb` WHERE `request_id`={$_REQUEST['checkid']}";
			$result = $conn->query($sql);
			if($result->num_rows !== 1){
				echo "<div class='alert alert-info mt-3' role='alert'>{$_REQUEST['checkid']} is still pending</div>";
				exit();
			}
		}
		if (!empty($_REQUEST['checkid'])){
			$sql = "SELECT * FROM `assignwork_tb` WHERE `request_id`= '".$_REQUEST['checkid']."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}	
?>

<h4 class="text-center text-capitalize  mt-4">assignd work details</h4>
<table class="table table-bordered">
	<tbody>
		<tr>
			<td>Request Id</td>
			<td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
		</tr>
		<tr>
			<td>Request info</td>
			<td><?php if(isset($row['requestinfo'])){echo $row['requestinfo'];} ?></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><?php if(isset($row['requestdesc'])){echo $row['requestdesc'];} ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?php if(isset($row['reqName'])){echo $row['reqName'];} ?></td>
		</tr>
		<tr>
			<td>Address 1</td>
			<td><?php if(isset($row['requesteradd1'])){echo$row['requesteradd1'];} ?></td>
		</tr>
		<tr>
			<td>Address 2</td>
			<td><?php if(isset($row['requesteradd2'])){echo $row['requesteradd2'];} ?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php if(isset($row['reqCity'])){echo $row['reqCity'];} ?></td>
		</tr>
		<tr>
			<td>State</td>
			<td><?php if(isset($row['reqState'])){echo $row['reqState'];} ?></td>
		</tr>
		<tr>
			<td>Zip Code</td>
			<td><?php if(isset($row['requesterzip'])){echo $row['requesterzip'];} ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php if(isset($row['requesterEmail'])){echo $row['requesterEmail'];} ?></td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td><?php if(isset($row['requesterMobile'])){echo $row['requesterMobile'];}?></td>
		</tr>
		<tr>
			<td>Assigned Date</td>
			<td><?php if(isset($row['date'])){echo $row['date'];}?></td>
		</tr>
		<tr>
			<td>Technician Assigned.</td>
			<td><?php if(isset($row['assigntech'])){echo $row['assigntech'];} ?></td>
		</tr>
		<tr>
			<td>Customer Sign</td>
			<td></td>
		</tr>
		<tr>
			<td>Technician Sign</td>
			<td></td>
		</tr>
	</tbody>
</table>
<div>
	<input type="submit" name="pirnt" class="btn btn-danger float-left d-print-none" value="Print" onClick="window.print()">
</div>
</div> <!--second column(form) ends-->

<?php
	} 
include 'include/footer.php';
?>
<script>
	function IsInputNumber(evt) {
		var ch = String.fromCharCode(evt.which);
		if(!(/[0-9]/.test(ch))){
			evt.preventDefault();
		}
	}
</script>
	
