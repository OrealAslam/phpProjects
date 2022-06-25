<?php 
session_start();
define('TITLE', 'Admin / Courses');
define('PAGE', 'Courses');
include 'include/header.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
?>

<?php 
if (isset($_POST['delete_course'])){
	require '../connection.php';
	$id    = trim(mysqli_real_escape_string($conn, $_POST['course_id']));
	$sql = "DELETE  FROM course_details WHERE id = ?";
	$stmt = $conn->prepare($sql);
	if ($stmt){
		$stmt->bind_param('i', $id);
		if($stmt->execute()){
			$msg = "<div class='alert alert-success text-center text-capitalize'>Courses deleted</div>";
		}
		else{
			$msg = "<div class='alert alert-danger text-center text-capitalize'>unable to delete course</div>";
		}
	}
	else{

		$msg = "<div class='alert alert-danger text-center text-capitalize'>ohh!! request forebidden</div>";
	}
}

?>
<div class="col-lg-10 col-md-9">
	<h5 class="text-center text-capitalize bg-danger mt-3 text-white py-1 px-0">Courses Available</h5>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Course Id</th>
					<th>Course Name</th>
					<th>Description</th>
					<th>Actual Price</th>
					<th>Sell Price</th>
					<th>Duration</th>
					<th>Details</th>
					<th>Action</th>	
				</tr>
			</thead>

			<?php 

			require '../connection.php';
			$sql = "SELECT * FROM course_details";
			$query = mysqli_query($conn, $sql);
			if(mysqli_num_rows($query) !== 0){
				while ($row = mysqli_fetch_assoc($query)){
					?>
			<tbody>
				
				<tr>
					<td><?php echo $row['id']; ?></td>

					<td><?php echo $row['c_name']; ?></td>

					<td style="max-width: 180px;"><?php echo $row['description']; ?></td>

					<td><?php echo $row['actual_price']; ?></td>

					<td><?php echo $row['sell_price']; ?></td>

					<td><?php echo $row['duration']; ?></td>
					
					<td style="max-width: 180px;"><?php echo $row['details']; ?></td>
					<td>
						<div class="form-inline flex-row">
							<form class="d-inline" method="POST" action="editcourse.php" role="form">
							<input type="hidden" name="course_id" value="<?php if(isset($row['id'])){echo $row['id'];} ?>">
							<button type="submit" name="edit_course" class="btn btn-danger mr-lg-1 d-inline"><i class="fas fa-edit "></i></button>
							</form>	

							<form method="POST" class="d-inline" action="<?php $_SERVER['PHP_SELF']; ?>">
								<input type="hidden" name="course_id" value="<?php if(isset($row['id'])){echo $row['id'];} ?>">
								<button type="submit" name="delete_course" class="btn btn-secondary d-inline"><i class="fas fa-trash-alt"></i></button>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
			<?php		
				}
			}
			else{
				$msg = "<div class='alert alert-info text-center text-capitalize'>no course available</div>";
			}			
			?>
		</table>
		<?php if(isset($msg)){echo $msg;} ?>
	</div>
</div>

<?php 
}
include 'include/footer.php';
?>