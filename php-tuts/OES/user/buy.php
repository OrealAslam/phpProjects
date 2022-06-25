<?php 
define('TITLE', 'Buy Course / Buy');
define('PAGE', 'Courses');

session_start();
require '../connection.php';
include 'include/header.php';
if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}
	// <!-- include sidebar 1st column -->
 include 'sidebar.php';
?>

<div class="col-lg-10 col-md-9 mt-3">
	<h4 class="text-capitalize text-sm-center text-muted">Course Information</h4>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Course ID</th>
					<th>Student ID</th>
					<th>Course Name</th>
					<th>Course Details</th>
					<th>Course Price</th>
					<th>Buy</th>
				</tr>
			</thead>
			<!-- selecting current student ID -->
			<?php 
				$query = "SELECT id FROM user_login WHERE email = '".$_SESSION['userlogin']['useremail']."' ";
				$row = $conn->query($query);

				if ($row == true){
					$userid = $row->fetch_assoc();
				}
			?>
						<!-- selecting required data from DB -->
			<?php 
				if (isset($_POST['requestcourse'])){					
					if (isset($_POST['course_id'])){
						$id = mysqli_real_escape_string($conn, $_POST['course_id']);
						$id = filter_var($id, FILTER_VALIDATE_INT);

						$sql = "SELECT * FROM course_details WHERE id = {$id}";
						$result = $conn->query($sql);

						if ($result == true){
							$data = $result->fetch_assoc();
			?>
			<tbody>
				<tr>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $userid['id']; ?></td>
					<td><?php echo $data['c_name']; ?></td>
					<td><?php echo $data['details']; ?></td>
					<td><?php echo $data['sell_price']; ?></td>
					<td>
						<div class="form-row justify-content-center">
							<form method="POST" action="submitrequest.php">
								<input type="hidden" name="userid" value="<?php echo $userid['id']; ?>">
								<input type="hidden" name="courseid" value="<?php echo $data['id']; ?>">
								<input type="hidden" name="coursename" value="<?php echo $data['c_name']; ?>">
								<input type="hidden" name="coursedetail" value="<?php echo $data['details']; ?>">
								<input type="hidden" name="courseprice" value="<?php echo $data['sell_price']; ?>">
								<abbr title="Buy"><button type="submit" class="btn btn-danger" name="finallybuy"><i class="fas fa-handshake"></i></button></abbr>
							</form>
						</div>
					</td>
				</tr>
			</tbody>
			<?php				
						}
					}
				}			
			?>
		</table>
	</div>
</div>

<!-- footer included -->
<?php
include 'include/footer.php';
?>