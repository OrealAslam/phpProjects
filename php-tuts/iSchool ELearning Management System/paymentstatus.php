<?php 
//start including header.php
include 'include/header.php';
//end including header.php
?>
<!-- start book image background -->
<div class="container-fluid bg-dark">
	<div class="row">
		<img src="images/coursing/book2.jpg" alt="courses" style="width: 100%; height: 500px; object-fit: cover; box-shadow: 10px; opacity: 0.7;">
	</div>
</div>
<!-- end book image background -->

<!-- payment status start -->
<div class="contaier">
	<h2 class="text-center text-capitalize mt-5">payment status</h2>
		<div class="col-sm-3 offset-sm-5">
			<form method="POST" action="#">
				<div class="form-group">
					<label for="order" class="col-form-label">Order ID :</label>
					<input type="text" class="form-control" name="orderid" id="order">
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary">View</button>
				</div>
			</form>
		</div>
</div>
<!-- payment status end -->


<!-- Contac form start -->
<?php include 'include/contactus.php'; ?>
<br>
<!-- Contac form end -->






<?php 
//start including footer.php
include 'include/footer.php'; 
//end including footer.php
?>