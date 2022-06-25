<?php 
define('TITLE', 'Edit Product');
define('PAGE', 'assets');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}

	if (isset($_REQUEST['id'])){
		$sql = "SELECT * FROM assets_tb WHERE p_id = {$_REQUEST['id']}";
		include '../db_connection.php';

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
	}
?>


<?php 
	if (isset($_REQUEST['update'])){

		$p_name  = $_REQUEST['p_name'];
		$dop     = $_REQUEST['dop'];
		$p_avail = $_REQUEST['p_avail'];
		$p_total = $_REQUEST['p_total'];
		$original_cost = $_REQUEST['original_cost'];
		$selling_cost = $_REQUEST['selling_cost'];

		if (($p_name == "") || ($dop == "") || ($p_avail == "") || ($p_total == "") || ($original_cost == "") || ($selling_cost == "")){
			$regmsg = "<div class='alert alert-warning text-center text-capitalize mt-3' role='alert'>all feilds required</div>";
		}
		else{
			$sql = "UPDATE assets_tb SET p_name = '$p_name', dop = '$dop', p_avail = '$p_avail', p_total ='$p_total', original_cost = '$original_cost', selling_cost = '$selling_cost' WHERE p_id = {$_REQUEST['id']}";

			include '../db_connection.php';
			$result = $conn->query($sql);
			if($result == TRUE){
				$regmsg = "<div class='alert alert-success text-center text-capitalize mt-3' role='alert'>product updated successfully</div>";
			}
			else{
				$regmsg = "<div class='alert alert-info text-center text-capitalize mt-3' role='alert'>unable to update product details</div>";
			}
		}
	}
?>

<!-- Second Column start -->
<div class="jumbotron col-md-5 mx-5 mt-n1">
	<div class="mt-n5">
			<h3 class="text-center bg-dark text-white text-capitalize p-1">update product/part details</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<label for="id">Product ID</label>
			<div class="form-group">
				<input type="text" class="form-control" name="id" id="id" value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];} ?>" readonly>			
			</div>

			<label for="name">Product Name</label>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="p_name" value="<?php echo $row['p_name']; ?>">			
			</div>	

			<label for="dop">Date Of Pruchase</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="dop" name="dop" value="<?php echo $row['dop']; ?>">	
			</div>
				
			<label for="pa">Product Available</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="pa" name="p_avail" value="<?php echo $row['p_avail']; ?>" onkeypress="isInputNumber(event)">	
			</div>

			<label for="ta">Total Product</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="ta" name="p_total" value="<?php if(isset($_REQUEST['p_total']))echo $row['p_total']; ?>" onkeypress="isInputNumber(event)">	
			</div>

			<label for="oc">Original Cost</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="oc" name="original_cost" value="<?php echo $row['original_cost']; ?>" onkeypress="isInputNumber(event)">	
			</div>

			<label for="sc">Selling Cost</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="sc" name="selling_cost" value="<?php echo $row['selling_cost']; ?>" onkeypress="isInputNumber(event)">	
			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-danger mt-3" name="update">Update</button>
				<a href="assets.php" class="btn btn-secondary mt-3" name="close">Close</a>
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