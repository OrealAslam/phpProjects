<?php 
session_start();
define('TITLE', 'Admin / Students');
define('PAGE', 'Students');
include 'include/header.php';
require '../connection.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
?>

<?php 
if (isset($_POST['delete_student'])){
	$email = trim(mysqli_real_escape_string($conn, $_POST['email']));

	$sql = "DELETE FROM user_login WHERE email = ?";
	$stmt = $conn->prepare($sql);

	if ($stmt || ($stmt->num_rows == 1)){
		$stmt->bind_param('s', $email);
		$delete = $stmt->execute();

		if ($delete){
			$stmt->close();
			$msg = "<div class='alert alert-warning text-center text-capitalize'>student deleted!!!</div>";
		}
	}
	else{
		$stmt->close();
			$msg = "<div class='alert alert-warning text-center text-capitalize'>unable to delete</div>";
	}
}

?>
<div class="col-lg-10 col-md-9 my-2">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>Profile</th>
					<th>Phone</th>
					<th>Gender</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT * FROM user_login";
					$result = $conn->query($sql);
					if ($result->num_rows > 0){
						while ($data = $result->fetch_assoc()){
							?>
							<tbody>
								<tr>
									<td><?php if(isset($data['username'])){echo $data['username'];} ?></td>

									<td><?php if(isset($data['email'])){echo $data['email'];} ?></td>

									<td>
										<img src="<?php if(isset($data['pic_source'])){echo "../user/" .$data['pic_source'];} ?>" class="img-fluid" width="80" height="80" alt="StudentPic">
									</td>
									<td><?php if(isset($data['phone'])){echo $data['phone'];} ?></td>
									<td><?php if(isset($data['gender'])){echo $data['gender'];} ?></td>
									<td>
										<div class="form-inline flex-row">
											<form class="d-inline" method="POST" action="editstudent.php" role="form">
											<input type="hidden" name="email" value="<?php if(isset($data['email'])){echo $data['email'];} ?>">
											<button type="submit" name="edit_student" class="btn btn-danger mr-lg-1 d-inline"><i class="fas fa-edit "></i></button>
											</form>	
<!-- ------------------------------------------------------------------------------------->
											<form method="POST" class="d-inline" action="<?php $_SERVER['PHP_SELF']; ?>">
												<input type="hidden" name="email" value="<?php if(isset($data['email'])){echo $data['email'];} ?>">
												<button type="submit" name="delete_student" class="btn btn-secondary d-inline"><i class="fas fa-trash-alt"></i></button>
											</form>
										</div>
									</td>
								</tr>
							</tbody>
				<?php			
						}
					}
					else{
						$msg = "<div class='alert alert-info text-center text-capitalize'>Empty DB</div>";
					}
				?>
			</tbody>
		</table>
	</div>
	<?php if(isset($msg)){echo $msg;} ?>
</div>



<!-- dashboard column end -->
<!-- sidebar row & container div end -->
</div> 	
</div>

<?php 
}
include 'include/footer.php';
?>