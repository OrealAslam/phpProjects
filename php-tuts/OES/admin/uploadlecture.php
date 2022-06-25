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
		<table class="table">
			<thead>
				<th>Course Id</th>
				<th>Course Name</th>
				<th>Recent Lecture</th>
				<th>Upoad Time</th>
				<th>Action</th>
			</thead>
			
				<?php 

					$sql = "SELECT id, c_name FROM course_details";
					$result = $conn->query($sql);
					if ($result->num_rows > 0){
						while ($data = $result->fetch_assoc()){
				?>
				<tbody>
					<tr>
						<td><?php if(isset($data['id'])){echo $data['id'];}?></td>
						<td><?php if(isset($data['c_name'])){echo $data['c_name'];}?></td>
						<td> <!--Recent uploaded lectures-->
							<?php
							$query = "SELECT max(lect_number) FROM course_lecture WHERE course_name = '".$data['c_name']."' ";
							$fetch = $conn->query($query);
							$row = $fetch->fetch_row();
							if(isset($row[0])){echo $row[0];}else{echo "0 Uploaded yet";}
							?>
						</td>
						<td> <!--Recent uploaded time-->
							<?php
							date_default_timezone_set('Asia/Karachi'); 
							$sql = "SELECT * FROM course_lecture WHERE lect_number = '".$row[0]."'";

								$time = $conn->query($sql);	
								$upload_time = $time->fetch_row();
								if ($upload_time) {
									echo $upload_time[5];
								}
							?>
						</td>
						<td>							
							<div class="form-inline float-left mr-1">
								<form method="GET" action="upload_lecture.php">
									<input type="hidden" name="hidden_id" value="<?php if(isset($data['id'])){echo $data['id'];} ?>">

									<input type="hidden" name="course_name" value="<?php if(isset($data['c_name'])){echo $data['c_name'];} ?>">
									<input type="hidden" name="recent_lect" value="<?php if(isset($row[0])){echo $row[0];}else{echo '0';} ?>">
									<abbr title="Upload_lecture"><button type="submit" class="btn btn-primary" name="upload_lect"><i class="fas fa-upload"></i></button></abbr>
								</form>
							</div>	
							<div class="form-inline">
								<form method="GET" action="viewlecture.php">
									<input type="hidden" name="view_id" value="<?php if(isset($data['id'])){echo $data['id'];} ?>">

									<abbr title="View Lectures"><button type="submit" class="btn btn-info" name="view"><i class="far fa-eye"></i></a></abbr>
								</form>								
							</div>
						</td>
					</tr>
				</tbody>
				<?php
						}
					}
					else{
						$msg = "<div class='alert alert-info text-center text-capitalize'>course table is empty</div>";
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