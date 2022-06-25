<?php 
define('TITLE', 'Add New User');
define('PAGE', 'requester');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}
?>

<?php 
if (isset($_REQUEST['submit'])){
	if(($_REQUEST['name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")){
		$regmsg = "<div class='mt-3 alert alert-warning' role='alert'>All Fields Required</div>";
	}
	else{
		$rname = $_REQUEST['name'];
		$remail = $_REQUEST['email'];
		$rpass = $_REQUEST['password'];
		include '../db_connection.php';
		$sql = "INSERT INTO requesterlogin_tb (r_name, r_email, r_password) VALUES ('$rname', '$remail', '$rpass')";
		$result = $conn->query($sql);
		if($result == TRUE){
			$regmsg = "<div class='mt-3 alert alert-success' role='alert'>user added successfully</div>";
		}
		else{
			$regmsg = "<div class='mt-3 alert alert-warning' role='alert'>unable to insert data in DB</div>";
		}
	}
}
?>
<!-- second column start -->
<div class="col-md-8 mx-3 col-sm-6 jumbotron">
	<div class="mt-n5">
			<h3 class="text-center bg-dark text-white text-capitalize p-1">Add new user</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

			<label for="name">Name</label>
			<div class="form-group">
				<input type="text" class="form-control" id="name" name="name">			
			</div>	

			<label for="email">Email</label>	
			<div class="form-group">
				<input type="email" class="form-control" id="email" name="email">
			</div>

			<label for="pass">Password</label>	
			<div class="form-group">
				<input type="password" class="form-control" id="pass" name="password">
			</div>
					
			<div class="text-center">
				<button type="submit" class="btn btn-danger mt-3" name="submit">Submit</button>
				<a href="requester.php" class="btn btn-secondary mt-3" name="close">Close</a>
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