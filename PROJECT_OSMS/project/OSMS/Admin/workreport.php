<?php 
define('TITLE', 'Work Report');
define('PAGE', 'workreport');

session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}
?>


<!-- Start second column -->
<div class="col-sm-4 col-md-7 text-center ml-5 mt-3">
	<form method="POST" class="d-print-none col-md-7 col-sm-4 mt-1" action="<?php echo $_SERVER['PHP_SELF'];?>">
	
			<div class="form-group">
				<input type="date" class="form-control" name="startdate" value="<?php if(isset($_REQUEST['startdate'])){echo $_REQUEST['startdate'];} ?>">
			</div>		
			<span class="font-weight-bold">to</span>

			<div class="form-group">
				<input type="date" class="form-control" name="enddate" value="<?php if(isset($_REQUEST['enddate'])){echo $_REQUEST['enddate'];} ?>">
			</div>
		<input type="submit" class="btn btn-danger " name="search">
		<input type="submit" class="btn btn-secondary" value="Print" onClick="window.print()">
	</form>
	<?php if(isset($regmsg)){echo $regmsg;} ?>
	<!-- table start -->
<?php 
if (isset($_REQUEST['search'])){
	if (($_REQUEST['startdate'] == "") || ($_REQUEST['enddate'] == "")){
		echo "<div class='alert alert-warning mt-2 text-center text-capitalize' role='alert'>all fields required</div>";
	}
	else{
		$fdate = $_REQUEST['startdate'];
		$ldate = $_REQUEST['enddate'];
		include '../db_connection.php';
		$sql = "SELECT *  FROM assignwork_tb WHERE `date` BETWEEN '$fdate' AND '$ldate' ORDER BY `date`";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
?>
	<div class="mt-5 col-md-12 col-sm-7 text-center">
		<table class="table table-bordered">
			<thead>
				<h3 class="text-capitalize bg-dark text-white">details</h3>
				<tr>
					<th>Request id</th>
					<th>Request Info</th>
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>Email</th>					
					<th>Mobile</th>					
					<th>Tech. Assign</th>					
					<th>Date</th>					
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $result->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['request_id'];?></td>
					<td><?php echo $row['requestinfo'];?></td>
					<td><?php echo $row['reqName'];?></td>
					<td><?php echo $row['requesteradd1'].''.$row['requesteradd2'];?></td>
					<td><?php echo $row['reqCity'];?></td>
					<td><?php echo $row['requesterEmail'];?></td>
					<td><?php echo $row['requesterMobile'];?></td>
					<td><?php echo $row['assigntech'];?></td>
					<td><?php echo $row['date'];?></td>
				</tr>
			</tbody>
		<?php } ?>
		</table>
	</div>
	<?php
		}
		else{
			echo "<div class='alert alert-warning mt-2 text-center text-capitalize' role='alert'>no record found</div>";
		}
	}
}

?>
	<!-- table end -->
</div>

<!-- End second column -->


<?php 
include 'includes/footer.php';
?>