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


<div class="col-lg-10 co-md-9">
	<?php if (isset($msg)) {
		echo $msg;
	} ?>
</div>


<?php 
if (isset($_POST['finallybuy'])){

	$course_id     = mysqli_real_escape_string($conn, $_POST['courseid']);
	$student_id    = mysqli_real_escape_string($conn, $_POST['userid']);
	$course_name   = mysqli_real_escape_string($conn, $_POST['coursename']);
	$course_detail = mysqli_real_escape_string($conn, $_POST['coursedetail']);
	$course_price  = mysqli_real_escape_string($conn, $_POST['courseprice']);

	$sql = "INSERT INTO buy_request (user_id, course_id, course_name, course_details, course_price) VALUES (?,?,?,?,?)";
	$stmt = $conn->prepare($sql);

	if ($stmt){			
			$stmt->bind_param('iissi', $student_id, $course_id, $course_name, $course_detail, $course_price);
			$execute = $stmt->execute();
			if($execute){
				$conn->close();	
				echo "<script>location.href='usercourses.php'</script>";
			}	
			else{
				$stmt->close();
				$conn->close();
				$msg = "<div class='alert alert-danger text-center text-capitalize' role='alert'>error!! Request forebidden</div>";
			}
	}			
}
?>


<!-- footer included -->
<?php
include 'include/footer.php';
?>