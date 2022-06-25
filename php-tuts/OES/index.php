<?php include 'mainheader.php'; 
include_once 'connection.php';
?>


<!-- Carousel Start -->

<div class="container-fluid">
	<div id="carousel-slide" class="carousel slide carousel-fade" data-ride="carousel">

		<ol class="carousel-indicators">
		    <li data-bs-target="#carousel-slide" data-bs-slide-to="0" class="active"></li>
		    <li data-bs-target="#carousel-slide" data-bs-slide-to="1"></li>
		    <li data-bs-target="#carousel-slide" data-bs-slide-to="2"></li>
	 	</ol>


		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/img-1.jpg" class="d-block w-100" style="height: 580px;">
			</div>
			<div class="carousel-item">
				<img src="images/1.jpg" class="d-block w-100" style="height: 580px;">
			</div>			
			<div class="carousel-item">
				<img src="images/4.jpg" class="d-block w-100" style="height: 580px;">
			</div>
		</div>

		<!-- image controller start -->
			<!-- slide back -->
			<a href="#carousel-slide" class="carousel-control-prev" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>

			<!-- slide next -->
			<a href="#carousel-slide" class="carousel-control-next" role="button" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		<!-- image controller end -->
	</div>
</div>
<!-- Carousel End -->

<!-- Courses Card start -->
<div class="container">
	<div class="jumbotron my-4">
		<h3 class="text-center text-capitalize mb-5 mt-n5">Popular Courses</h3>
		<div class="row row-cols-md-2 row-cols-lg-3">
		<!-- thumbnail for courses cards-->
<?php
	$sql = "SELECT * FROM course_details";
	$result = $conn->query($sql);
	if ($result->num_rows >0){
		while ($data = $result->fetch_assoc()){
?>			
			<div class="col-md-4 mb-lg-0 mb-3">
				<div class="card shadow-lg">
					<img src="<?php echo 'admin/'.$data['avatar_source']; ?>" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title"><?php echo $data['c_name']; ?></h5>
						<p class="card-text"><?php echo $data['description']; ?></p>
						<p class="card-text">old price:  &#x20B9;<del>12000</del><br></p>
						<p>discount : <span class="badge bg-warning text-dark">&#x20B9;<?php echo $data['sell_price'];?></span></p>	
						<a href="user/login.php" class="btn btn-primary float-right py-1 pb-0">Purchase</a>
					</div>
				</div>
			</div>
<?php }} ?>
			
		</div>	
	</div>	
</div>

<!-- Courses Card end -->


<!-- Comment section start -->

<div class="container mb-5">
	<h3 class="text-left bg-dark text-white py-3 px-3 mb-5 shadow-lg">Comment Section <i class="far fa-comment-dots"></i></h3>
	<div class="row">
		<div class="col">
			<!-- comment-1 -->
			<div class="media">
				<img src="images/oreal.jpeg" class="img-fluid rounded-circle" style="margin-right: 10px; width: 45px; height: 45px;" alt="">
				<div class="media-item">
					<h4>Oreal Aslam</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>

			<!-- comment-2 -->
			<div class="media">
				<img src="images/oreal.jpeg" class="img-fluid rounded-circle" style="margin-right: 10px; width: 45px; height: 45px;" alt="">
				<div class="media-item">
					<h4>Yahoo Baba</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>

			<!-- comment-3 -->
			<div class="media">
				<img src="images/oreal.jpeg" class="img-fluid rounded-circle" style="margin-right: 10px; width: 45px; height: 45px;" alt="">
				<div class="media-item">
					<h4>John Doe</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Comment section end -->


<!-- Contact Form start -->

<div class="container name text-white shadow-lg mb-4 py-5">
	<div class="py-3 px-3 text-center display-5 mr-5 mt-0 shadow-lg">Get in Touch</div>
	<div class="row">
		<div class="container">
			<div class="row">
				<!-- form start-->
				<div class="col-sm-7 mt-2 mx-auto">
					<form method="POST" action="#">
						<div class="form-group">
							<label for="name"><i class="fas fa-user mr-2"></i>Name</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="enter name">
						</div>

						<div class="form-group">
							<label for="email"><i class="fas fa-envelope mr-2"></i>Email</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="enter email">
						</div>

						<div class="form-group">
							<label for="msg"><i class="fas fa-sms mr-2"></i>Message</label>
							<textarea class="form-control" id="msg" name="message" placeholder="Message" style="height: 150px;"></textarea>
						</div>
						<button type="submit" class="btn btn-danger btn-block" name="email_send">Contact Us</button>
					</form>
				</div>
				<!-- form end-->
			</div>			
		</div>
	</div>
</div>
<!-- Contact Form end -->



<!-- Footer start -->
<?php include 'mainfooter.php'; ?>