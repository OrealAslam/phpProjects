<?php 
define('TITLE', 'Registered Courses');
define('PAGE', 'Courses');

session_start();
include 'include/header.php';
if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}

	// <!-- include sidebar 1st column -->
 include 'sidebar.php';
 require '../connection.php';
?>
<div class="col-md-10">
	<div class="row mt-3">
		<div class="col-md-12 col-sm-9">
			<h3 class="text-capitalize d-inline-block">my courses</h3>
			<abb title="Buy more courses..."><a href="buycourse.php" class="btn btn-outline-warning float-right">Buy More</a></abbr>

<!-- form that display student buy courses -->

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
			if (isset($_POST['select_course'])){
				if (!empty($_POST['select_course'])){	
		?>
		<h5 class="bg-dark text-capitalize text-center p-1 text-white">Displaying your lecture</h5>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Lect no#</th>
							<th>Lect Topic</th>
							<th>Lecture</th>
							<th>Time</th>
							<th>Reviews</th>
						</tr>
					</thead>
					<!-- now get user ID using SESSION array and course ID using option tag-->
				<?php  

					$search = mysqli_real_escape_string($conn, $_POST['select_course']);

					$sql_course_id = "SELECT course_id FROM course_lecture WHERE course_name LIKE '%$search%'";
					$course_id = $conn->query($sql_course_id);
					if($course_id->num_rows == 0){die('Course not available yet');}
					$data = $course_id->fetch_assoc();
					
					$sql_user_id = "SELECT id FROM user_login WHERE email = '".$_SESSION['userlogin']['useremail']."'";
					$user_id = $conn->query($sql_user_id);
					$user_id = $user_id->fetch_assoc();

				// checking the select course available in DB against userid or not
					$check = "SELECT user_course_id FROM student_courses WHERE user_id = '".$user_id['id']."' AND  user_course_id = '".$data['course_id']."'";
					$found = $conn->query($check);
					
					if ($found->num_rows > 0){
						$lecture = "SELECT * FROM course_lecture WHERE course_id = {$data['course_id']}";
						
						$result = $conn->query($lecture);

						if ($result->num_rows > 0){
							while ($lect = $result->fetch_assoc()){
				?>
				<!-- now display the requested result by the User in tabular form -->
				<tbody>
					<tr>
						<td><?php echo $lect['lect_number']; ?></td>
						<td><?php echo $lect['lect_name']; ?></td>
						<td>
							<video width="90" height="80" controls><source src="<?php echo '../admin/'.$lect['lect_source']; ?>"  type="video/mp4"></video>
						</td>
						<td><?php echo $lect['time']; ?></td>
						<td>
							<?php $like = 0; $dislike = 0; ?>
							<form method="GET" action="reviews.php">
								<input type="hidden" name="liked" value="<?php echo $like; ?>">
								<input type="hidden" name="disliked" value="<?php echo $dislike; ?>">
								<input type="hidden" name="lect_no" value="<?php echo $lect['lect_number']; ?>">

								<input type="hidden" name="course" value="<?php echo $_POST['select_course']; ?>">

								<button type="submit" class="btn btn-primary" name="like" ><i class="far fa-thumbs-up mr-2"></i></button>
				  				<button type="submit" class="btn btn-danger" name="dislike"><i class="far fa-thumbs-down mr-2"></i>0</button>
							</form>
						</td>
					</tr>
				</tbody>
				<?php
							}
						}
					}
				?>
		<?php
				}
			}

		?>
	</div>
</div>			
		<!-- first row end -->
	</div>

	</div>
</div>






<!-- footer included -->
<?php
include 'include/footer.php';
?>