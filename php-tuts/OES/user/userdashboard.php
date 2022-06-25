<?php 
define('TITLE', 'User Dashboard');
define('PAGE', 'Dashboard');

session_start();
include 'include/header.php';

if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}
?>

<!-- include sidebar 1st column -->
<?php include 'sidebar.php'; ?>

<!-- dashboard column start -->
<div class="col-md-10 col-lg-9 mt-3">
	<div class="row justify-content-center">
		<div class="col-md-3 mb-md-0 mb-3">
			<div class="card bg-danger text-white text-center">
				<div class="card-header font-bolder">Courses Detail</div>
				<div class="card-body">
					<div class="card-title">2</div>
					<a href="#" class="btn text-white">View</a>
				</div>
			</div>
		</div>

		<div class="col-md-3 mb-md-0 mb-3">
			<div class="card bg-success text-white text-center">
				<div class="card-header text-bolder">Total Lectures</div>
				<div class="card-body">
					<div class="card-title">2</div>
					<a href="#" class="btn text-white">View</a>
				</div>
			</div>
		</div>

		<div class="col-md-3 mb-md-0 mb-3">
			<div class="card bg-info text-white text-center">
				<div class="card-header text-bolder">Lectures Uploaded</div>
				<div class="card-body">
					<div class="card-title">2</div>
					<a href="#" class="btn text-white">View</a>
				</div>
			</div>
		</div>
	</div>
	<!-- 1st row(cards) end -->

	<div class="row my-3 justify-content-center">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table">
					<thead class="bg-dark text-white">
						<tr>
							<th>Lect#</th>
							<th>Description</th>
							<th>Duration</th>
							<th>Download</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>1</td>
							<td>Intro. to PHP</td>
							<td class="text-muted">8:22 mins</td>
							<td class="text-primary"><a href="#"><i class="fas fa-cloud-download-alt"></i></a></td>
						</tr>

						<tr>
							<td>2</td>
							<td>echo statement in PHP</td>
							<td class="text-muted">8:22 mins</td>
							<td class="text-primary"><a href="#"><i class="fas fa-cloud-download-alt"></i></a></td>
						</tr>

						<tr>
							<td>3</td>
							<td>Print statement in PHP</td>
							<td class="text-muted">6:14 mins</td>
							<td class="text-primary"><a href="#"><i class="fas fa-cloud-download-alt"></i></a></td>
						</tr>

						<tr>
							<td>4</td>
							<td>echo vs print</td>
							<td class="text-muted">14:22 mins</td>
							<td class="text-primary"><a href="#"><i class="fas fa-cloud-download-alt"></i></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- 2nd row end -->
</div>
<!-- dashboard column end -->



	</div>
</div>





<!-- footer included -->
<?php
include 'include/footer.php';
?>