<?php 
define('TITLE', 'Sell Report');
define('PAGE', 'soldproductrecord');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}
?>

<!-- Start second column -->
<div class="col-sm-4 col-md-5 text-center ml-3 mt-3">
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
		$sql = "SELECT *  FROM customer_tb WHERE cpdate BETWEEN '$fdate' AND '$ldate'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
?>
	<div class="mt-5 text-center">
		<table class="table table-bordered">
			<thead>
				<h3 class="text-capitalize bg-dark text-white">details</h3>
				<tr>
					<th>Cust. id</th>
					<th>Product id</th>
					<th>Cust. name</th>
					<th>Address</th>
					<th>Product Name</th>					
					<th>Quantity</th>					
					<th>Bill Paid</th>	
					<th>Date</th>				
				</tr>
			</thead>
			<tbody>
				<?php while ($row = $result->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['cust_id'];?></td>
					<td><?php echo $row['p_id'];?></td>
					<td><?php echo $row['cust_name'];?></td>
					<td><?php echo $row['cust_addr'];?></td>
					<td><?php echo $row['cpname'];?></td>
					<td><?php echo $row['cpquantity'];?></td>
					<td><?php echo $row['cptotal'];?></td>
					<td><?php echo $row['cpdate'];?></td>
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