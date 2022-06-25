<?php 
session_start();
define('TITLE', 'Admin / Upload Lecture');
define('PAGE', 'Add Lecture');
include 'include/header.php';
require '../connection.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
?>

<div class="col-lg-10 col-md-9 my-3">
	<div class="table-responsive">
		<table class="table table-borderless">
			<thead>
				<tr>
					<th>Lect no</th>
					<th>Lect Name</th>
					<th>Lecture</th>
				</tr>
			</thead>
			<?php 
				require '../connection.php';
				$sql = "SELECT * FROM course_lecture WHERE course_id = {$_GET['view_id']}";
				$view = $conn->query($sql);
				if($view){
					while ($view_lect = $view->fetch_assoc()){
			?>
			<tbody>
				<tr>
					<td><?php echo $view_lect['lect_number']; ?></td>
					<td><?php echo $view_lect['lect_name']; ?></td>
					<td>
						<video width="220" height="180" controls>
						  <source src="<?php echo $view_lect['lect_source']; ?>" type="video/mp4">
						</video>
					</td>
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