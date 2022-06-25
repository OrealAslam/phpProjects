<?php 
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
session_start();
include 'includes/header.php';

	if(!isset($_SESSION['aLogin'])){
		echo "<script>location.href='adminlogin.php'</script>";
	}

	// making Requests Recieve Dynamic
	$sql = "SELECT max(request_id)FROM submitrequest_tb";
	include '../db_connection.php';
	$result = $conn->query($sql);
	$row = $result->fetch_row();
	// echo "<pre>";print_r($row);echo "</pre>";exit();
	$submit_request = $row[0];

	// making Assigned Work Dynamic
	$sql = "SELECT max(r_no)FROM assignwork_tb";
	include '../db_connection.php';
	$result = $conn->query($sql);
	$row = $result->fetch_row();
	// echo "<pre>";print_r($row);echo "</pre>";exit();
	$assignwork = $row[0];

	// making No. of Technician Dynamic
	$sql = "SELECT *FROM technician_tb";
	include '../db_connection.php';
	$result = $conn->query($sql);
	$total = $result->num_rows;
	// echo "<pre>";print_r($row);echo "</pre>";exit();
	$technician = $total;

?>
 

			<div class="col-lg-10 col-md-9"> <!-- Second column starts-->
				<div class="row text-center text-white ml-3"> <!--Nested div start-->
					
					<div class="col-lg-3 col-md-4 mr-3 mb-md-3 mt-lg-0 mt-md-3 mt-sm-2 mb-sm-2 mr-md-0"  style="max-width: 18rem;">
						<div class="card bg-danger">
							<div class="card-header">Reqs. Recieved</div>
							<div class="card-body">
								<div class="card-title"><?php echo $submit_request; ?></div>
								<a href="request.php" class="btn text-white">View</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 mr-3 mb-md-3 mb-sm-2 mt-sm-2 mt-md-0" style="max-width: 18rem;">
						<div class="card bg-success">
							<div class="card-header">Assigned Work</div>
							<div class="card-body">
								<div class="card-title"><?php echo $assignwork; ?></div>
								<a href="work.php" class="btn text-white">View</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 mb-md-3 mb-sm-2 mr-md-0" style="max-width: 18rem;">
						<div class="card bg-info">
							<div class="card-header">Technicians</div>
							<div class="card-body">
								<div class="card-title"><?php echo $technician; ?></div>
								<a href="technician.php" class="btn text-white">View</a>
							</div>
						</div>
					</div>
				</div> <!--Nested div ends-->

				<div class=" mt-5 text-center"> <!--Dynamic Table-->
					<p class="bg-dark text-white p-2">List of Requesters</p>

					<?php 
					include '../db_connection.php';
						$sql = "SELECT r_login_id, r_name, r_email FROM requesterlogin_tb";
						$result = $conn->query($sql);
						if($result->num_rows > 0){
							echo '
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
										<th scope="col">Requester ID</<th>
										<th scope="col">Name</<th>
										<th scope="col">Email</<th>
										</tr>
									</thead>

									<tbody>';
									while($row = $result->fetch_assoc()){
										echo '<tr>
										<td>'.$row['r_login_id'].'</td>
										<td>'.$row['r_name'].'</td>
										<td>'.$row['r_email'].'</td>
										<tr>';
									}
									echo '</tbody>
								</table>
								</div>
							';
						 }	
						
					?>
				</div>  <!--Dynamic Table-->

			</div> <!-- Second column ends-->	


<?php 
include 'includes/footer.php';
 ?>