<?php 
session_start();
define('TITLE', 'Admin / Courses Details');
define('PAGE', 'Courses');
include 'include/header.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
	require '../connection.php';
?>
<?php
if (isset($_POST['edit_course'])){
	if (isset($_POST['course_id'])){
		$id    = trim(mysqli_real_escape_string($conn, $_POST['course_id']));
		$sql    = "SELECT * FROM course_details WHERE id = {$id}";
		$result = $conn->query($sql);
		$row    = $result->fetch_assoc(); 
	}	
}							
?>

<?php 
if (isset($_POST['update'])){

	if(($_POST['id'] == "") || ($_POST['cname'] == "") || ($_POST['desc'] == "") || ($_POST['meta'] == "") || ($_POST['duration'] == "") || ($_POST['aprice'] == "") || ($_POST['sprice'] == "") || ($_POST['details'] == "")){
		$msg = "<div class='alert alert-warning text-center text-capitalize'>fill all fields</div>";	
	}


	$thumbnail  = $_FILES['thumbnail']['name'];
	$temp_dir   = $_FILES['thumbnail']['tmp_name'];
	$thumbnail  = $_FILES['thumbnail']['name'];
	$upload_dir = "thumbnail/".$thumbnail;

	$extension  = pathinfo($thumbnail, PATHINFO_EXTENSION);

	if (($_FILES['thumbnail']['name'] == "")) {
		$msg = "<div class='alert alert-warning text-center text-capitalize'>thumbnail required</div>";
	}

	if($extension == 'jpg' OR $extension == 'jpeg' OR $extension =='png' OR $extension =='gif'){

		$upload = move_uploaded_file($temp_dir, $upload_dir);
	}
	else{
		$msg = "<div class='alert alert-warning text-center text-capitalize'>not an image file</div>";
	}

if ($upload){

	$id       = trim(mysqli_real_escape_string($conn, $_POST['id']));
	$cname    = trim(mysqli_real_escape_string($conn, $_POST['cname']));
	$desc     = trim(mysqli_real_escape_string($conn, $_POST['desc']));
	$meta     = trim(mysqli_real_escape_string($conn, $_POST['meta']));
	$duration = trim(mysqli_real_escape_string($conn, $_POST['duration']));
	$aprice   = trim(mysqli_real_escape_string($conn, $_POST['aprice']));
	$sprice   = trim(mysqli_real_escape_string($conn, $_POST['sprice']));
	$details  = trim(mysqli_real_escape_string($conn, $_POST['details']));
	$sql = "UPDATE course_details SET c_name = ?, description = ?, meta = ?, duration = ?, details = ?, actual_price = ?, sell_price = ?, avatar = ?, avatar_source = ? WHERE id = ?";
			$stmt = $conn->prepare($sql);

	if ($stmt){
		$stmt->bind_param('sssssiissi', $cname, $desc, $meta, $duration, $details, $aprice, $sprice, $thumbnail, $upload_dir, $id);
		$execute = $stmt->execute();

		if ($execute){
			$msg = "<div class='alert alert-success text-center text-capitalize'>updated successfully!!!</div>";
		}
		else{
			$msg = "<div class='alert alert-danger text-center text-capitalize'>error while updating info</div>";
		}
			}
		else{
			$msg = "<div class='alert alert-info text-center text-capitalize'>update request forebidden</div>";
		}
	}
}	
?>


<div class="col-lg-9 col-md-7 mb-4">
	<h4 class="text-center text-capitalize bg-primary text-white mt-3 py-1">edit course detail</h4>
	<form method="POST" action="editcourse.php" enctype="multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-4  offset-md-2">
					<label for="id">Course Id</label>
					<input type="text" class="form-control" name="id" value="<?php if(isset($row['id'])){echo $row['id'];} ?>" readonly>
				</div>
			</div>
			  <div class="form-row justify-content-center">
			  	<div class="form-group col-md-4">
			  		<label for="cname">Course Name</label>
			  		<input type="text" class="form-control" name="cname" value="<?php if(isset($row['c_name'])){echo $row['c_name'];} ?>" id="cname">
			  	</div> 

			  	<div class="form-group col-md-4">
			  		<label for="desc">Description</label>
			  		<input type="text" class="form-control" value="<?php if(isset($row['description'])){echo $row['description'];} ?>" name="desc" id="desc">
			  	</div>
			  </div>

			  <div class="form-row justify-content-center">
			  	<div class="form-group col-md-4">
			  		<label for="meta">Meta Desc.</label>
			  		<input type="text" class="form-control" value="<?php if(isset($row['meta'])){echo $row['meta'];} ?>" name="meta" id="meta">
			  	</div>
			  	<div class="form-group col-md-4">
			  		<label for="duration">Duration</label>
			  		<input type="text" class="form-control" value="<?php if(isset($row['duration'])){echo $row['duration'];} ?>" name="duration" id="duration">
			  	</div>
			  </div>

			  <div class="form-row justify-content-center">
			  	<div class="form-group col-md-4">
			  		<label for="aprice">Actual Price</label>
			  		<input type="text" class="form-control" value="<?php if(isset($row['actual_price'])){echo $row['actual_price'];} ?>" name="aprice" id="aprice">
			  	</div>
			  	<div class="form-group col-md-4">
			  		<label for="sprice">Sell Price</label>
			  		<input type="text" class="form-control" value="<?php if(isset($row['sell_price'])){echo $row['sell_price'];} ?>" name="sprice" id="sprice">
			  	</div>
			  </div>

			  <div class="form-group offset-md-2">
			  	<label for="details">Course Detail</label>
			  	<textarea name="details" class="form-control col-md-8"><?php if(isset($row['details'])){echo $row['details'];} ?>"</textarea>
			  </div>
			  <!-- thumbnail file -->
			<div class="row justify-content-center">
			<div class="col-md-8">
			<div class="input-group mb-3">
			  <input type="file" class="form-control" name="thumbnail" id="thumbnail">
			  <label class="input-group-text" for="thumbnail">Upload</label>
			</div>
			</div>
			</div>

			<input type="reset" class="float-right btn btn-warning" name="reset">
			<button type="submit" name="update" class="btn btn-danger float-right mr-2">Update Info</button>
			</form>

			<?php if(isset($msg)){echo $msg;} ?>
</div>


<?php 
}
include 'include/footer.php';
?>
