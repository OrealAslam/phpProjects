<?php 
session_start();
define('TITLE', 'Admin Dashboard');
define('PAGE', 'Admin Dashboard');
include 'include/header.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
?>

<!-- total courses in db table -->
<?php 
require '../connection.php';
$sql = "SELECT * FROM course_details";
$result = $conn->query($sql);
$total_courses = $result->num_rows;
// echo "<pre>";print_r($row);echo "</pre>";exit();
$courses = $total_courses;

$query = "SELECT * FROM user_login";
$run = $conn->query($query);
$total_student = $run->num_rows;
// echo "<pre>";print_r($row);echo "</pre>";exit();
$student = $total_student;
?>


<!-- 2ND COLUMN START -->
<!-- dashboard column start -->
<div class="col-md-9 col-lg-10  mt-3">
	<div class="row text-center text-white ml-3"> <!--Nested div start-->
					
					<div class="col-lg-3 col-md-4 mr-3 mb-sm-3 mt-lg-0 mt-md-3 mt-sm-2 mb-sm-2 mr-md-0"  style="max-width: 18rem;">
						<div class="card bg-danger">
							<div class="card-header">Courses</div>
							<div class="card-body">
								<div class="card-title"><?php echo $courses; ?></div>
								<a href="admincourses.php" class="btn text-white">View</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 mr-3 mb-sm-3 mb-sm-2 mt-sm-2 mt-md-0" style="max-width: 18rem;">
						<div class="card bg-success">
							<div class="card-header">Students</div>
							<div class="card-body">
								<div class="card-title"><?php echo $student; ?></div>
								<a href="handlestudents.php" class="btn text-white">View</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 mb-md-3 mb-sm-2 mr-md-0" style="max-width: 18rem;">
						<div class="card bg-info">
							<div class="card-header">Teachers</div>
							<div class="card-body">
								<div class="card-title">8</div>
								<a href="#" class="btn text-white">View</a>
							</div>
						</div>
					</div>
				</div> <!--Nested div ends-->
				<h6 class="text-center bg-dark text-white p-1">Recent Students</h6>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Email</th>
								<th>Course</th>
								<th>Date</th>
								<th>Duration</th>
							</tr>
						</thead>
						<?php 
							$query = "SELECT * FROM user_login";
							$stmt = $conn->query($query);

							if ($stmt->num_rows > 0){
								while ($data = $stmt->fetch_assoc()){
						?>
						<tbody>
							<tr>
								<td><?php echo $data['id']; ?></td>
								<td><?php echo $data['username']; ?></td>
								<td><?php echo $data['email']; ?></td>
								<td><?php echo $data['id']; ?></td>
								<td><?php echo $data['id']; ?></td>
								<td><?php echo $data['id']; ?></td>
							</tr>
						</tbody>
						<?php			
								}
							}
						?>
					</table>
				</div>
	</div>
<!-- dashboard column end -->
<!-- sidebar row & container div end -->
</div> 	
</div>

<?php 
}
include 'include/footer.php';
?>