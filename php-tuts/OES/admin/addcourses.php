<?php 
session_start();
define('TITLE', 'Add Courses');
define('PAGE', 'Add Courses');
include 'include/header.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
	include 'include/sidebar.php';

	if (isset($_POST['insert_course'])){
		
		if (($_POST['cname'] == "") || ($_POST['desc'] == "") || ($_POST['meta'] == "") || ($_POST['duration'] == "") || ($_POST['aprice'] == "") || ($_POST['sprice'] == "") || ($_POST['details'] == "")){
			$msg = "<div class='alert alert-warning text-center text-capita;ize'>all fields required</div>";
			
		}
		else{	
			
			require '../connection.php';
			$cname 	  = mysqli_real_escape_string($conn, $_POST['cname']);
			$desc 	  = mysqli_real_escape_string($conn, $_POST['desc']);
			$meta 	  = mysqli_real_escape_string($conn, $_POST['meta']);
			$duration = mysqli_real_escape_string($conn, $_POST['duration']);
			$aprice   = mysqli_real_escape_string($conn, $_POST['aprice']);
			$sprice   = mysqli_real_escape_string($conn, $_POST['sprice']);
			$detail   = mysqli_real_escape_string($conn, $_POST['details']);

			
			$sql = "INSERT INTO course_details (c_name, description, meta, duration, details, actual_price, sell_price)  VALUES (?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($sql);

			if ($stmt){
				$stmt->bind_param('sssssdd', $cname, $desc, $meta, $duration, $detail, $aprice, $sprice);
				$execute = $stmt->execute();

				if ($execute){
					$stmt->close();
					$msg = "<div class='alert alert-success text-center text-capita;ize'>added successfully!!!</div>";
				}
				else{
					$msg = "<div class='alert alert-warning text-center text-capita;ize'>unable to add course</div>";
				}

			}
			else{
				$msg = "<div class='alert alert-danger text-center text-capita;ize'>request forbidden</div>";
			}
		}

	}
?>
<!-- add course section start -->
<div class="col-lg-10 col-md-8">
<h6 class="text-center bg-danger mt-3 text-white py-1 ">Add New Course</h6>

	<div class="row py-3 mx-0 bg-primary justify-content-center">
		<div class="col-md-8">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			  <div class="form-row">
			  	<div class="form-group col-md-6">
			  		<label for="cname" class="text-white">Course Name</label>
			  		<input type="text" class="form-control" name="cname" id="cname">
			  	</div>

			  	<div class="form-group col-md-6">
			  		<label for="desc" class="text-white">Description</label>
			  		<input type="text" class="form-control" name="desc" id="desc">
			  	</div>
			  </div>

			  <div class="form-row">
			  	<div class="form-group col-md-6">
			  		<label for="meta" class="text-white">Meta Desc.</label>
			  		<input type="text" class="form-control" name="meta" id="meta">
			  	</div>
			  	<div class="form-group col-md-6">
			  		<label for="duration" class="text-white">Duration</label>
			  		<input type="text" class="form-control" name="duration" id="duration">
			  	</div>
			  </div>

			  <div class="form-row">
			  	<div class="form-group col-md-6">
			  		<label for="aprice" class="text-white">Actual Price</label>
			  		<input type="text" class="form-control" name="aprice" id="aprice">
			  	</div>
			  	<div class="form-group col-md-6">
			  		<label for="sprice" class="text-white">Sell Price</label>
			  		<input type="text" class="form-control" name="sprice" id="sprice">
			  	</div>
			  </div>

			  <div class="form-group">
			  	<label for="cdetails" class="text-white">Course Details</label>
			  	<textarea type="text" name="details" class="form-control" id="cdetails"></textarea>
			  </div>
		<?php if(isset($msg)){echo $msg;} ?>

			  <input type="reset" class="float-right btn btn-warning" name="reset">
			  <input type="submit" class="btn btn-danger float-right mr-2" name="insert_course" value="Add course">
			</form>
		</div>
	</div>
</div>

<!-- add course section end -->

<!-- sidebar row & container div end -->
</div> 	
</div>
<?php 

include 'include/footer.php';
?>