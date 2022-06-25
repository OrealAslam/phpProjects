	<?php 
	define('TITLE', 'Aassign work Info');
	define('PAGE', 'Work Info');
	session_start();
	include 'includes/header.php';
		if(!isset($_SESSION['aLogin'])){
			echo "<script>location.href='adminlogin.php'</script>";
		}	
	if (isset($_REQUEST['back'])){
		echo "<script>location.href='work.php'</script>";
	}
		
	?>
	<!-- Start Second Column -->
	<div class="col-md-8 col-sm-6 mt-3">
		<?php 
				include '../db_connection.php';
					$sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
		?>
		<h3 class="text-center">Assign Work Detail</h3>
		<table class="table">
			<tbody>
				<tr>
					<td>Id</td>
					<td><?php echo $row['request_id']; ?></td>
				</tr>	
				<tr>
					<td>Info</td>
					<td><?php echo $row['requestinfo']; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $row['reqName']; ?></td>
				</tr>	
				<tr>
					<td>Address</td>
					<td><?php echo $row['requesteradd1']; ?></td>
				</tr>	
				<tr>
					<td>Email</td>
					<td><?php echo $row['requesterEmail']; ?></td>
				</tr>
				<tr>
					<td>Zip</td>
					<td><?php echo $row['requesterzip']; ?></td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td><?php echo $row['requesterMobile']; ?></td>
				</tr>	
				<tr>
					<td>Technician</td>
					<td><?php echo $row['assigntech']; ?></td>
				</tr>
				<tr>
					<td>Date</td>
					<td><?php echo $row['date']; ?></td>
				</tr>
			</tbody>		
		</table>
			<div>
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input type="submit" class="btn btn-danger d-print-none mr-3" name="print" value="Print" onClick="window.print()">
					<button class="btn btn-secondary d-print-none" name="back">Close</button>
				</form>
			</div>
	</div> 
	<!-- End Second Column -->

	<?php 
	include 'includes/footer.php';

		
	 ?>