<?php 
define('TITLE', 'Sale Products');
define('PAGE', 'assets');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}

	if (isset($_REQUEST['submit'])){
		include '../db_connection.php';

		if(($_REQUEST['id'] == "")||($_REQUEST['cname'] == "")||($_REQUEST['caddr'] == "")||($_REQUEST['p_name'] == "")||($_REQUEST['quantity'] == "")||($_REQUEST['price_each'] == "") ||($_REQUEST['total_price'] == "")||($_REQUEST['date'] == "")){
			$regmsg = "<div class='alert alert-warning mt-3 text-capitalize text-center' role='alert'>all fields required</div>";
		}
		else{	
				$pid         		 = $_REQUEST['id'];	
				$cname       		 = $_REQUEST['cname'];	
				$caddr       		 = $_REQUEST['caddr'];	
				$p_name      		 = $_REQUEST['p_name'];	
				$quantity    		 = $_REQUEST['quantity'];	
				$price_each  		 = $_REQUEST['price_each'];	
				$total_price 		 = $_REQUEST['total_price'];	
				$date        		 = $_REQUEST['date'];	
				$Available_product   = $_REQUEST['p_avail'];

				$remaining_product	 = $_REQUEST['p_avail'] - $_REQUEST['quantity'];

			if(($Available_product < 1)){
				echo $regmsg = "<div class='alert alert-danger mt-3 text-capitalize text-center' role='alert'>product not Available</div>"; die();
			}
			if(($_REQUEST['quantity']) > ($_REQUEST['p_avail'])){
					echo $regmsg = "<div class='alert alert-danger mt-3 text-capitalize text-center' role='alert'>product not Available</div>"; die();
				}

			$sql = "INSERT INTO customer_tb (p_id, cust_name, cust_addr, cpname, cpquantity, cpeach, cptotal, cpdate) VALUES ('".$pid."', '".$cname."', '".$caddr."', '".$p_name."', '".$quantity."', '".$price_each."', '".$total_price."', '".$date."')";

			

				$result = $conn->query($sql);
				if($result == TRUE){
					$regmsg = "<div class='alert alert-success mt-3 text-capitalize text-center' role='alert'>inserted successfully</div>";

					$sql = "UPDATE assets_tb SET p_avail = '$remaining_product' WHERE p_id = '$pid'";
					$result = $conn->query($sql);
					if($result == true){
						
						echo "<script>location.href='customerrecipt.php'</script>";
					}
					else{
						$regmsg = "<div class='alert alert-success mt-3 text-capitalize text-center' role='alert'>ohh!! something went wrong</div>";
					}
				}
				else{
					$regmsg = "<div class='alert alert-danger mt-3 text-capitalize text-center' role='alert'>unable to insert data</div>";
				}	
		}
	}
?>

<!-- Second Column start -->
<div class="jumbotron col-md-5 mx-5 mt-n1">
	<div class="mt-n5">
			<h3 class="text-center bg-dark text-white text-capitalize p-1">customer bill</h3>
			<?php 
				if (isset($_REQUEST['sale'])){
					$sql = "SELECT * FROM assets_tb WHERE p_id = {$_REQUEST['id']}";
					include '../db_connection.php';
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
				}
			?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<label for="id">Product ID</label>
			<div class="form-group">
				<input type="text" class="form-control" name="id" id="id" value="<?php if(isset($_REQUEST['id'])){echo $_REQUEST['id'];} ?>" readonly>			
			</div>

			<label for="cname">Customer Name</label>
			<div class="form-group">
				<input type="text" class="form-control" id="cname" name="cname">			
			</div>

			<label for="caddr">Customer Address</label>
			<div class="form-group">
				<input type="text" class="form-control" id="caddr" name="caddr">			
			</div>

			<label for="name">Product Name</label>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="p_name" value="<?php if(isset($row['p_name'])){echo $row['p_name'];}?>">			
			</div>	

			
			<label for="pa">Product Available</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="pa" name="p_avail" value="<?php if(isset($row['p_avail'])){echo $row['p_avail'];}?>" onkeypress="isInputNumber(event)" readonly>	
			</div>

			<label for="quan">Quantity</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="quan" name="quantity" value="<?php if(isset($_REQUEST['quantity'])){echo $_REQUEST['quantity'];} ?>" onkeypress="isInputNumber(event)">	
			</div>

			<label for="price">Price Each</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="price" name="price_each" value="<?php if(isset($row['selling_cost'])){echo $row['selling_cost'];}?>" onkeypress="isInputNumber(event)">	
			</div>

			<label for="tc">Total Price</label>	
			<div class="form-group">
				<input type="text" class="form-control" id="tc" name="total_price" onkeypress="isInputNumber(event)">	
			</div>

			<label for="date">Date</label>	
			<div class="form-group">
				<input type="date" class="form-control" id="date" name="date" onkeypress="isInputNumber(event)">	
			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-danger mt-3" name="submit">Submit</button>
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
			if (!(/[0-9]/.test(ch))){
				evt.preventDefault();
			}
		}
</script>
<?php 
include 'includes/footer.php';
?>