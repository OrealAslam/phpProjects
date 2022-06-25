<?php 
define('TITLE', 'Buy Course');
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

<div class="col-lg-10 col-md-9 mt-5">
	<div class="table-responsive">
		<table class="table table-sm">
			<thead>
				<tr>
					<th>Course</th>
					<th class="d-md-block d-none" style="max-width: 350px;">Details</th>
					<th>Price</th>
					<th class="bg-primary text-white text-center">Add to Cart</th>
				</tr>
			</thead>
			<?php 
				$sql = "SELECT * FROM course_details";
				$result = $conn->query($sql);
				if ($result == true){
					while ($data = $result->fetch_assoc()){
			?>

			<tbody>
				<tr>
					<td><?php echo $data['c_name']; ?></td>
					<td style="max-width: 350px;"><?php echo $data['details']; ?></td>
					<td><?php echo $data['sell_price']; ?></td>
					<td>
						<div class="form-row justify-content-center">
							<form method="POST" action="buy.php">
								<input type="hidden" name="course_id" value="<?php if(isset($data['id'])){echo $data['id'];} ?>">
								<abbr title="Add to Cart"><button type="submit" name="requestcourse" class="btn btn-warning"><i class="fas fa-shopping-cart"></i></button></abbr>
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
	</div>
</div>


<!-- footer included -->
<?php
include 'include/footer.php';
?>