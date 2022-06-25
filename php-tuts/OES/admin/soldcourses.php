<?php 
session_start();
define('TITLE', 'Admin / Sold Courses');
define('PAGE', 'Sold Courses');
include 'include/header.php';
require '../connection.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
	require '../connection.php';
?>

<div class="col-lg-10 col-md-7 mt-4">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center text-capitalize bg-dark text-white">Sold Courses</div>


		<div class="col-md-6 table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Course ID</th>
						<th>Course Name</th>						
					</tr>
				</thead>
				<?php 
					$sql = "SELECT course_id FROM sold_courses";
					$result = $conn->query($sql);
					if ($result->num_rows > 0){
						while ($data = $result->fetch_assoc()){
							$course_id = filter_var($data['course_id'], FILTER_VALIDATE_INT);
							$query = "SELECT c_name FROM course_details WHERE id = {$course_id}";
							$res = $conn->query($query);
							if ($info = $res->fetch_assoc()){
				?>
				<tbody>
					<tr>
						<td><?php echo  $course_id;?></td>
						<td><?php echo  $info['c_name'];?></td>
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
</div>



<!-- dashboard column end -->
<!-- sidebar row & container div end -->
</div> 	
</div>

<?php 
}
include 'include/footer.php';
?>