<?php include 'mainheader.php'; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 my-2 bg-primary">
			<a href="user/login.php" class="float-right mr-5 text-white"><i class="far fa-user mr-2"></i>Login</a>
			<a href="user/register.php" class="float-right mr-4 text-white"><i class="fas fa-unlock-alt mr-2"></i>Register</a>
		</div>
	</div>
</div>

<!-- main content area start -->
<div class="container">
	<div class="row justify-content-center mb-5 mt-5">
		<div class="col-md-10">
			<h3>Our Mission</h3>
			<p>Consectetur adipiscing elit, sued do eiusmod tempor ididunt udfgt labore et dolore magna aliqua. Quis ipsum suspendisces gravida. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus.

			Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan.</p>
		</div>
	</div>

	<!-- row 2 start -->
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h3>Our Vision</h3>
			<p>Consectetur adipiscing elit, sued do eiusmod tempor ididunt udfgt labore et dolore magna aliqua. Quis ipsum suspendisces gravida. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus. Risus commodo viverra sebfd dho eiusmod tempor maecenas accumsan lacus.</p>
		</div>
	</div>
	<!-- row 2 end -->
</div>
<!-- main content area end -->

<!-- colorful jumbotron start -->

<div class="container-fluid mt-5" style="background-color: #3333ff;">
	<div class="row">
		<div class="col-md-12" >
			<!-- caresoul start -->


			<div id="carousel-slide" class="carousel slide carousel-fade" data-ride="carousel">

				<ol class="carousel-indicators">
				    <li data-bs-target="#carousel-slide" data-bs-slide-to="0" class="active"></li>
				    <li data-bs-target="#carousel-slide" data-bs-slide-to="1"></li>
				    <li data-bs-target="#carousel-slide" data-bs-slide-to="2"></li>
			  </ol>

				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="images/img-1.jpg" class="d-block mx-auto my-5 img-fluid rounded-circle" style="height: 150px; width: 150px;">
						<div class="carousel-caption d-none d-md-block">
					        <h5>First slide label</h5>
					        <p class="text-center text-white">You can;t succeed if you just do what others do and follow the well-worn path. You need to create a new and original path for yourself.</p>
					    </div>
					</div>
					<div class="carousel-item active">
						<img src="images/img-1.jpg" class="d-block mx-auto my-5 img-fluid rounded-circle" style="height: 150px; width: 150px;">
						<div class="carousel-caption d-none d-md-block">
					        <h5>First slide label</h5>
					        <p class="text-center text-white">You can;t succeed if you just do what others do and follow the well-worn path. You need to create a new and original path for yourself.</p>
					    </div>
					</div>
					<div class="carousel-item active">
						<img src="images/img-1.jpg" class="d-block mx-auto my-5 img-fluid rounded-circle" style="height: 150px; width: 150px;">
						<div class="carousel-caption d-none d-md-block">
					        <h5>First slide label</h5>
					        <p class="text-center text-white">You can;t succeed if you just do what others do and follow the well-worn path. You need to create a new and original path for yourself.</p>
					    </div>
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
			<!-- caresoul end -->
		</div>
	</div>
</div>
<!-- colorful jumbotron end -->


<!-- Footer start -->
<?php include 'mainfooter.php'; ?>
