<?php 
	define('TITLE', 'Technician');
	define('PAGE', 'technician');
	session_start();
	include 'includes/header.php';
		
		
		if(!isset($_SESSION['aLogin'])){
			echo "<script>location.href='adminlogin.php'</script>";
		}


?>

<?php 
if (isset($_REQUEST['delete'])){
	$sql = "DELETE FROM technician_tb WHERE tech_id = {$_REQUEST['id']}";
	include '../db_connection.php';
	$result = $conn->query($sql);
	if($result == TRUE){
		$regmsg = "<div class='alert alert-danger' role='alert'>Deleted Successfully!!</div>";
	}
	else{
		$regmsg = "<div class='alert alert-info' role='alert'>Error while deleting data from DB</div>";
	}
}
?>
	<!-- Second column start -->
	<div class="col-md-10 col-sm-9 mt-3 text-center">
		<p class="text-capitalize bg-dark text-white">list of technicians</p>
		<table class="table">
			<thead>
				<tr>
					<th>Tech. ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>City</th>
					<th>Mobile	</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					include '../db_connection.php';
					$sql = "SELECT * FROM technician_tb";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
						while($row = $result->fetch_assoc()){
						?>
						<tr>
							<td><?php echo $row['tech_id']; ?></td>
							<td><?php echo $row['tech_name']; ?></td>
							<td><?php echo $row['tech_email']; ?></td>
							<td><?php echo $row['tech_city']; ?></td>
							<td><?php echo $row['tech_mobile']; ?></td>
							<td>
								<div>
									<form method="POST" action="edittech.php" class="d-inline">
										<input type="hidden" name="id" value="<?php echo $row['tech_id'];?>">
										<button type="submit" class="btn btn-info" name="edit"><i class="fas fa-pen"></i></button>
									</form>
									<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="d-inline">
										<input type="hidden" name="id" value="<?php echo $row['tech_id'];?>">
										<button type="submit" class="btn btn-secondary" name="delete"><i class="far fa-trash-alt"></i></button>
									</form>
								</div>
							</td>
						</tr>
						<?php
						}
					}
					else{
						$regmsg = "<div class='alert alert-info'>No record found</div>";
					}
				?>
			</tbody>
		</table>
		<div>
		<?php if(isset($regmsg)){echo $regmsg;}?>	
		</div>
	</div>
	<div class="ml-auto mr-5">
		<a href="addnewtech.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
	</div>
	<!-- Column 2 ends -->



	<?php 
	include 'includes/footer.php';
	?>