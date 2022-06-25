<?php 
session_start();
define('TITLE', 'Requested Courses');
define('PAGE', 'Course Requests');
include 'include/header.php';
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}
else{
	include 'include/sidebar.php';
	require '../connection.php';
?>

<div class="col-lg-10 col-md-9 mt-3">
	<h5 class="bg-dark text-white text-center text-capitalize"></h5>
	<div class="row">		
	<?php 

		$sql = "SELECT * FROM buy_request";
		$result = $conn->query($sql);
		if ($result == true){
			while ($req = $result->fetch_assoc()){	
				
		?>
		<div class="card col-md-3">
			<div class="card-header">User ID : <?php echo $req['user_id']; ?></div>
			<div class="card-body">
				<h6 class="card-title">Course ID : <?php echo $req['course_id']; ?></h6>
				<p class="card-text"><?php echo $req['course_name']; ?></p>

				<div class="card-footer">
					<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
						<input type="hidden" name="courseid" value="<?php if(isset($req['course_id'])){echo $req['course_id'];} ?>">
						<input type="hidden" name="userid" value="<?php if(isset($req['user_id'])){echo $req['user_id'];}  ?>">
						<div class="btn-group btn-block">
							<button type="submit" name="approve" class="btn btn-outline-danger">Approve</button>
							<button type="submit" name="deleterequest" class="btn btn-outline-primary">Delete</button>
						</div>
					</form>
				</div>

			</div>
		</div>
		<?php	
			}
		}
		else{
			echo "<div class='bg-danger text-white text-center mt-5'>No requests yet</div>";
		}
		?>	
	</div>
<!-- approve course requests -->
<?php 
if (isset($_POST['approve'])){

	if (isset($_POST['userid']) && isset($_POST['courseid'])){
		$userid   = mysqli_real_escape_string($conn, $_POST['userid']);
		$courseid = mysqli_real_escape_string($conn, $_POST['courseid']);

		$userid   = filter_var($userid, FILTER_VALIDATE_INT);
		$courseid = filter_var($courseid, FILTER_VALIDATE_INT);

		$sql  = "INSERT INTO student_courses (user_id, user_course_id) VALUES (?,?)";
		$stmt = $conn->prepare($sql);
		if ($stmt){
			$stmt->bind_param('ii', $userid, $courseid);
			if($stmt->execute()){
				$query = "INSERT INTO sold_courses (course_id) VALUES (?)";
				$res   = $conn->prepare($query);
				if ($res){
					$res->bind_param('i', $courseid);
					if($res->execute()){
						$conn->close();
						echo "Approved Successfully";
					}
					else{
						$res->close();
						$conn->close();
						echo "Unable to sold course";
					}
				}
				else{
					$conn->close();
					echo "Unable to prepare Obj";
				}
			}
			else{
				$stmt->close();
				$conn->close();
			}
		}

	}
}	

?>
</div>

<!-- delete approved request -->
<?php 
if (isset($_POST['deleterequest'])){
	$userid   = mysqli_real_escape_string($conn, $_POST['userid']);
	$courseid = mysqli_real_escape_string($conn, $_POST['courseid']);

	$userid   = filter_var($userid, FILTER_VALIDATE_INT);
	$courseid = filter_var($courseid, FILTER_VALIDATE_INT);

	$sql = "DELETE FROM buy_request WHERE user_id = ? AND course_id = ?";
	$stmt = $conn->prepare($sql);

	if ($stmt){
		$stmt->bind_param('ii', $userid, $courseid);
		$stmt->execute();
	}
}
?>

<!-- dashboard column end -->
<!-- sidebar row & container div end -->
</div> 	
</div>
<script type="text/javascript">
	function success(){
		alert('Approved successfully');
	}

	function error(){
		alert('Ohh!! Not Approved');
	}
</script>
<?php 
}
include 'include/footer.php';
?>