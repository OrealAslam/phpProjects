<?php 
define('TITLE', 'Add New Product');
define('PAGE', 'assets');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}
?>
<?php 
if (isset($_REQUEST['insert'])){

	$p_name        = $_REQUEST['p_name'];
	$dop           = $_REQUEST['dop'];
	$p_avail       = $_REQUEST['p_avail'];
	$p_total       = $_REQUEST['p_total'];
	$original_cost = $_REQUEST['original_cost'];
	$selling_cost  = $_REQUEST['selling_cost'];

	if (($p_name == "") || ($dop == "") || ($p_avail == "") || ($p_total == "") || ($original_cost == "") || ($selling_cost == "")){
		$regmsg = "<div class='alert alert-warning text-center text-capitalize mt-3' role='alert'>all feilds required</div>";
	}
else{

	$sql = "INSERT INTO assets_tb (p_name, dop, p_avail, p_total, original_cost, selling_cost) VALUES ('$p_name', '$dop', '$p_avail', '$p_total', '$original_cost', '$selling_cost')";
	include '../db_connection.php';
	$result = $conn->query($sql);
	if($result == TRUE){
		$regmsg = "<div class='alert alert-success text-center text-capitalize mt-3' role='alert'>Product added successfully!!</div>";
	}
	else{
		$regmsg = "<div class='alert alert-danger text-center text-capitalize mt-3' role='alert'>Unable to add a new product</div>";
	}
}	
}

?>
<!-- second column start -->
<div class="col-md-8 mx-3 col-sm-6 jumbotron">
	<div class="mt-n5">
			<h3 class="text-center bg-dark text-white text-capitalize p-1">Add new product</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

			<label for="name">Product Name</label>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="p_name">			
			</div>	

			<label for="dop">Date Of Pruchase</label>	
			<div class="form-group">
				<input type="date" class="form-control" id="dop" name="dop">
			</div>

			<label for="pa">Product Available</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="pa" name="p_avail">
			</div>

			<label for="pt">Product Total</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="pt" name="p_total">
			</div>

			<label for="oc">Original Cost</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="oc" name="original_cost">
			</div>

			<label for="sc">Selling Cost</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="sc" name="selling_cost">
			</div>
					
			<div class="text-center">
				<button type="submit" class="btn btn-danger mt-3" name="insert">Submit</button>
				<a href="assets.php" class="btn btn-secondary mt-3" name="close">Close</a>
			</div>		
			<?php 
			if(isset($regmsg)){echo $regmsg;}?>
		</form>
	</div>
</div>
<!-- second column end -->



<?php 
include 'includes/footer.php';
 ?>