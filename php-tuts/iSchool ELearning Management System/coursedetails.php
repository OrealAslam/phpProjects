<!--start include header -->
<?php include 'include/header.php'; ?>
<!--end include header -->


<!-- start book image background -->
<div class="container-fluid bg-dark">
	<div class="row">
		<img src="images/coursing/book2.jpg" alt="courses" style="width: 100%; height: 500px; object-fit: cover; box-shadow: 10px; opacity: 0.7;">
	</div>
</div>
<!-- end book image background -->



<!-- start main content -->
<div class="container mt-5">
	<div class="row">
		<div class="col-md-4">
			<img src="images/coursing/guitar.jpg" class="card-img-top" alt="guitar">
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<h5 class="card-title">Course Name: Learn Guitar</h5>
				<p class="card-text">Description : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodd est laborum.</p>
				<p class="card-text">Duration: 10 Days</p>
				<form method="POST" action="#">
					<p class="card-text d-inline">Price	:<small><del>&#8377 2000</del> </small><span class="font-weight-bolder">&#8377 200</span></p>
					<button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="buy" >Buy</button>
				</form>
			</div>
		</div>
	</div>
	
</div>
<!-- end main content -->

<div class="container">
	<div class="row">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">Lesson No.</th>
					<th scope="col">Lesson Name</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td scope="row" class="font-weight-bolder">1</td>
					<td>Intrduction</td>
				</tr>

			</tbody>
		</table>
	</div>
</div>




<!-- start including footer  -->
<?php include 'include/footer.php'; ?>
<!-- end including footer -->
