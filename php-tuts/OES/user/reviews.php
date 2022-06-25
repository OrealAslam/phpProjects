<?php 
define('TITLE', 'Reviews');
define('PAGE', 'Courses');

session_start();
include 'include/header.php';
if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}
// <!-- include sidebar 1st column -->
 include 'sidebar.php';
 require '../connection.php';

 if (isset($_GET['like'])){

 	$like =  $_GET['liked'] + 1;
 	$like = filter_var($like, FILTER_VALIDATE_INT);

 	$dislike = trim(mysqli_real_escape_string($conn, $_GET['disliked']));
 	$dislike = filter_var($dislike, FILTER_VALIDATE_INT);

 	$lect_no = trim(mysqli_real_escape_string($conn, $_GET['lect_no']));
 	$lect_no = filter_var($lect_no, FILTER_VALIDATE_INT);

 	$course_name = trim(mysqli_real_escape_string($conn, $_GET['course']));
 	

 	$sql = "SELECT id FROM course_details WHERE c_name LIKE '%$course_name%'";
 	
 	$result = $conn->query($sql);

 	if ($id = $result->fetch_row()){
 		$id  = filter_var($id[0], FILTER_VALIDATE_INT);


 		$query = "INSERT INTO student_reviews (course_id, lect_no, liked, disliked) VALUES ($id, $lect_no, $like, $dislike)";
 		
 		if($conn->query($query)){ 			
 			$conn->close();
 			echo "<script>location.href='usercourses.php'</script>";
 		}
 		else{
 			$conn->close();
 			$msg = "<div class='alert alert-warning text-center' role='alert'>unable to process your request</div>";
 		}
 	}
 	else{
 		$msg = "<div class='alert alert-info text-center' role='alert'>unable to fetch course id</div>";
 	}
 	
 }

?>

<div class="col-lg-7 col-md-6 mt-4">
	<?php if (isset($msg)) {
		echo $msg;
	} ?>
</div>


<!-- footer included -->
<?php
include 'include/footer.php';
?>