<?php 
define('TITLE', 'Requester');
define('PAGE', 'requester');
session_start();
include 'includes/header.php';
	
	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}

	if (isset($_REQUEST['delete'])){
		include '../db_connection.php';
		$sql = "DELETE FROM requesterlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
		$result = $conn->query($sql);
		if($result == TRUE){
			$regmsg = "<div class='alert alert-danger mt-3 text-center' role='alert'>User deleted!!<div>"; 
		}
		else{
			$regmsg = "<div class='alert alert-info mt-3 text-center' role='alert'>Unable to delete user<div>";
		}
	}
?>

<!-- Column 2 starts -->
<div class="col-md-10 col-sm-9 mt-3 text-center">
	<p class="text-capitalize bg-dark text-white">list of requesters</p>
	<table class="table">
		<thead>
			<tr>
				<th>Requester ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php 
				include '../db_connection.php';
				$sql = "SELECT * FROM requesterlogin_tb";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $row['r_login_id']; ?></td>
						<td><?php echo $row['r_name']; ?></td>
						<td><?php echo $row['r_email']; ?></td>
						<td>
							<div>
								<form method="POST" action="editrequester.php" class="d-inline">
									<input type="hidden" name="id" value="<?php echo $row['r_login_id'];?>">
									<button type="submit" class="btn btn-info" name="edit"><i class="fas fa-pen"></i></button>
								</form>
								<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="d-inline">
									<input type="hidden" name="id" value="<?php echo $row['r_login_id'];?>">
									<button type="submit" class="btn btn-secondary" name="delete"><i class="far fa-trash-alt"></i></button>
								</form>
							</div>
						</td>
					</tr>
					<?php
					}
				}
			?>
		</tbody>
	</table>
	<div>
		<?php if(isset($regmsg)){echo $regmsg;} ?>
	</div>
</div>
<div class="ml-auto mr-5">
	<a href="addnewuser.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
</div>
<!-- Column 2 ends -->



<?php 
include 'includes/footer.php';
?>