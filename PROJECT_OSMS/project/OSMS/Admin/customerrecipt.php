<?php 
define('TITLE', 'Assets');
define('PAGE', 'assets');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}
?>

<!-- Column 2 recipt start -->
<div class="col-sm-7">
	<table class="table jumbotron">
		
		<tbody>
			<h3 class="text-center text-capitalize">Customer Bill</h3>
			<?php 

				$sql = "SELECT * FROM customer_tb";
				include '../db_connection.php';
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
			?>
			<tr>
				<th>Product ID</th>
				<td><?php echo $row['p_id']; ?></td>
			</tr>
			<tr>
				<th>Customer Name</th>
				<td><?php echo $row['cust_name']; ?></td>
			</tr>
			<tr>
				<th>Product Name</th>
				<td><?php echo $row['cpname']; ?></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td><?php echo $row['cpquantity']; ?></td>
			</tr>
			<tr>
				<th>Product Price</th>
				<td><?php echo $row['cpeach']; ?></td>
			</tr>
			<tr>
				<th>Bill Paid</th>
				<td><?php echo $row['cptotal']; ?></td>
			</tr>
			<tr>
				<th>Date</th>
				<td><?php echo $row['cpdate']; ?></td>
			</tr>
		</tbody>
	</table>
	<button type="submit" class="btn btn-danger d-print-none" onClick="window.print()">Print</button>
	<a href="assets.php" class="btn btn-secondary d-print-none">Back</a>
</div>

<!-- Column 2 recipt end -->

<?php 
include 'includes/footer.php';
?>	