<?php 

// function that check empty fields

function check_input($arg){
	foreach ($arg as $input){
		if($input == "" or $input == NULL){
			$msg = "<div class='alert alert-warning text=capitalize text-center' role='alert'>all fields required</div>";
			die($msg);
		}
		return true;
	}
	
}
// main code for signup operation

if (isset($_POST['signup'])){
	$status = check_input($_POST);
	if ($status !== false){
		require 'store_info_toDB.php';
		$insert_obj = new Insert_Data();
		echo $insert_obj->Insert_info($_POST);
	}
}



?>


<!DOCTYPE html>
<html>
<head>
		<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<!-- font awsome added -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Signup Form</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="form-group">
						<label for="uname">Username</label>
						<input type="text" class="form-control" name="username" id="uname">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email">
					</div>

					<div class="form-group">
						<label for="pass">Password</label>
						<input type="password" class="form-control" name="password" id="pass">
					</div>

					<div class="form-group">
						<label for="dob">Date of Birth</label>
						<input type="date" class="form-control" name="dob" id="dob">
					</div>

					<label class="my-3">Gender</label><br>
					<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
					  <input type="radio" class="btn-check" name="gender" value="male" id="btnradio1" autocomplete="off" checked>
					  <label class="btn btn-outline-primary" for="btnradio1">Male</label>

					  <input type="radio" class="btn-check" name="gender" value="female" id="btnradio2" autocomplete="off">
					  <label class="btn btn-outline-primary" for="btnradio2">Female</label>

					  <input type="radio" class="btn-check" name="gender" value="others" id="btnradio3" autocomplete="off">
					  <label class="btn btn-outline-primary" for="btnradio3">Others</label>
					</div>
					<br><br>

					<div class="btn-group justify-content-end">
						<button type="submit" class="btn btn-danger " name="signup">Signup</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- javascript files -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>