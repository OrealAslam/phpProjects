<?php 
session_start();
define('TITLE', 'Admin / Manage Lectures');
define('PAGE', 'Manage Lectures');
include 'include/header.php';
require '../connection.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
	require '../connection.php';
?>

<!-- delete specific lecture -->


<div class="col-lg-10 col-md-9 col-sm-12 my-3">
	<h4 class="text-md-center text-capitalize text-dark">manage lectures</h4>

	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<select class="form-select form-select-lg mb-5" name="select_course">	
			<option disabled selected>Select Course</option>
			<option value="PHP">PHP</option>
			<option value="Python">Python</option>
			<option value="Andriod Development">Andriod Development</option>
			<option value="IOS Development">IOS Development</option>
		</select>
		<input type="submit" class="btn btn-dark btn-sm" name="submit" vlaue="Select Course">
	</form>
<?php 
// display selected course lectures

if (isset($_POST['select_course'])){
	if(!empty($_POST['select_course'])){
?>
	<!-- form display lecture details -->
	<h5 class="bg-dark text-capitalize text-center p-1 text-white">Displaying lecture details</h5>

	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Lect no#</th>
					<th>Description</th>
					<th>Lecture</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php 
			$search = mysqli_real_escape_string($conn, $_POST['select_course']);

				$sql = "SELECT * FROM course_lecture WHERE course_name LIKE '%$search%'";
				$result = $conn->query($sql);
				if ($result == true){
					while ($data = $result->fetch_assoc()){
				?>
				<tbody>
					<tr>
						<td><?php echo $data['lect_number']; ?></td>
						<td><?php echo $data['lect_name']; ?></td>
						<td><video  width="120" height="80" controls><source src="<?php echo $data['lect_source']; ?>" type="video/mp4"></video></td>
						<td>
							<div class="form-row">
								<form method="POST" action="lectnumber.php">
									<input type="hidden" name="lect_no" value="<?php if(isset($data['lect_number'])){echo $data['lect_number'];} ?>">

									<abbr title="Delete Lecture"><button type="submit" class="btn btn-danger mr-1" name="delete"><i class="fas fa-trash-alt"></i></button></abbr>
								</form>								
							</div>
						</td>
					</tr>
				</tbody>
				<?php
					}
				}
				else{
					echo "<div class='alert alert-info text-center text-capitalize mt-5'>No record found</div>";
				}
			?>
		</table>
		<?php if(isset($msg)){echo $msg;} ?>
	</div>
</div>
<?php 
	}
}
?>

<!-- dashboard column end -->
<!-- sidebar row & container div end -->
</div> 	
</div>

<?php 
}
include 'include/footer.php';
?>