<?php 
define('TITLE', 'Assets');
define('PAGE', 'assets');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}
	
if (isset($_REQUEST['delete'])){
	$p_id = $_REQUEST['id'];
	$sql = "DELETE FROM assets_tb WHERE p_id = {$p_id}";
	include '../db_connection.php';
	$result = $conn->query($sql);

	if ($result == TRUE){
		$regmsg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>Product deleted successfully!!</div>";
	}
	else{
		$regmsg = "<div class='alert alert-success text-center text-capitalize' role='alert'>unable to delete product</div>";
	}
}	
?>
<!-- Colunm 2 starts -->
<div class="col-md-9 col-sm-10">
	<h4 class="text-capitalize text-center bg-dark text-white p-2">product/parts detalis</h4>
	<table class="table table-bordered table-light mx-3">
		<thead>
			<tr>
				<th>P. ID</th>
				<th>P.Name</th>
				<th>DOP</th>
				<th>P Avail.</th>
				<th>Total Products</th>
				<th>Orginal Cost</th>
				<th>Sell. Cost</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<?php 
			$sql = "SELECT * FROM assets_tb";
			include '../db_connection.php';
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
		?>
		<tbody>
			<tr>
				<td><?php echo $row['p_id'] ?></td>
				<td><?php echo $row['p_name'] ?></td>
				<td><?php echo $row['dop'] ?></td>
				<td><?php echo $row['p_avail'] ?></td>
				<td><?php echo $row['p_total'] ?></td>
				<td><?php echo $row['original_cost'] ?></td>
				<td><?php echo $row['selling_cost'] ?></td>
				<td>
					<div class="form-inline">
						<form method="POST" action="editproduct.php" class="d-inline">
							<input type="hidden" name="id" value="<?php echo $row['p_id'];?>">
							<button type="submit" class="btn btn-info" name="edit"><i class="fas fa-pen"></i></button>
						</form>
						<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="d-inline">
							<input type="hidden" name="id" value="<?php echo $row['p_id'];?>">
							<button type="submit" class="btn btn-secondary" name="delete"><i class="far fa-trash-alt"></i></button>
						</form>
						<form method="POST" action="saleproduct.php" class="d-inline">
							<input type="hidden" name="id" value="<?php echo $row['p_id'];?>">
							<button type="submit" class="btn btn-warning" name="sale"><i class="far fa-handshake"></i></butto>n
						</form>
					</div>	
				</td>
			</tr>
		</tbody>
		<?php 
				}
			}
			else{
				$regmsg = "<div class='alert alert-info mt-3 text-capitalize text-center' role='alert'>No record found</div>";
			}
		 ?>
	</table>
	<?php if(isset($regmsg)) {echo $regmsg;} ?>

	<div class="float-right mr-0">
		<a href="addnewproduct.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
	</div>
</div>
<!-- Colunm 2 end -->




<?php 
include 'includes/footer.php';
 ?>