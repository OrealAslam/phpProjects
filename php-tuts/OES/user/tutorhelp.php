<?php 
define('TITLE', 'Teacher Help');
define('PAGE', 'Tutor Help');

session_start();
include 'include/header.php';
if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}


	// <!-- include sidebar 1st column -->
 include 'sidebar.php';
?>

<!-- tutor help form start -->
<div class="col-lg-10 col-12 my-3 mx-auto">
	<div class="bg-primary col-md-12 px-3 py-3">
		<form method="POST" action="">
			<div class="form-floating">
				<label for="name" class="text-white"><i class="fas fa-user mr-2"></i>username</label>
				<input type="text" class="form-control" id="name" readonly name="username"/>
			</div>

			<div class="form-group">
				<label for="email" class="text-white"><i class="fas fa-envelope mr-2"></i>email</label>
				<input type="email" class="form-control" id="email" readonly name="email"/>
			</div>

			<div class="form-floating">
				<label for="Textarea" class="text-white">Type Problem</label>
			  <textarea class="form-control mb-3" placeholder="Problem you face &#128512;" id="Textarea"></textarea>
			  
			</div>

			<label class="text-white"><i class="fas fa-laptop-code mr-2"></i>Your Course</label>
			<div class="form-inline text-white justify-content-center">
				<div class="form-check mr-5">
				  <input class="form-check-input" type="checkbox" name="php&mysql" id="check1">
				  <label class="form-check-label" for="check1">
				    PHP & MySql
				  </label>
				</div>

				<div class="form-check mr-5">
				  <input class="form-check-input" type="checkbox" name="python" id="check2">
				  <label class="form-check-label" for="check2">
				    Python
				  </label>
				</div>

				<div class="form-check mr-5">
				  <input class="form-check-input" type="checkbox" name="andriod" id="check3">
				  <label class="form-check-label" for="check3">
				    Andriod Development
				  </label>
				</div>

				<div class="form-check mr-5">
				  <input class="form-radio-input" type="checkbox" name="graphic" id="check4">
				  <label class="form-check-label" for="check4">
				    Graphic Designing
				  </label>
				</div>
			</div>

			<div class="btn-group mt-5" role="group" aria-label="Basic example">
			  <button type="submit" name="send" class="btn btn-danger">Submit</button>
			  <button type="reset" class="btn btn-warning">Reset</button>
			</div>

		</form>
	</div>
</div>
<!-- tutor help form end -->



	</div>
</div>


<!-- footer included -->
<?php
include 'include/footer.php';
?>