<?php 
/*
Register a new User
*/

// Include DB Connection
include ('db_connection.php');
	if (isset($_REQUEST['rSignup'])){
		// CHECKING INPUT FIELDS ARE EMPTY OR NOT
		if (($_REQUEST['rName'] =="") || ($_REQUEST['rPassword'] =="") || ($_REQUEST['rEmail'] == "")) {
			$regmsg = '<div class="alert alert-warning" role="alert">All Fields Required</div>';
		}
		else{
			$sql="SELECT r_email FROM requesterlogin_tb WHERE r_email ='".$_REQUEST['rEmail']."'";
			$result = $conn->query($sql);
			if ($result->num_rows == 1){
				$regmsg = '<div class="alert alert-danger" role="alert">Email Alredy Exists</div>';
			}
			else{
				$rName = $_REQUEST['rName'];
				$rEmail = $_REQUEST['rEmail'];
				$rPassword = $_REQUEST['rPassword'];
				// INSERING DATA INTO DB

				$sql = "INSERT INTO requesterlogin_tb (r_name, r_email, r_password) VALUES ('$rName', '$rEmail', '$rPassword')";
				if($conn->query($sql)){
					$regmsg = '<div class="alert alert-success" role="alert">Signed Up successfully</div>';
				}

			}
		}
	}
?>


<!-- Start Registration From  start-->
	<div class="container pt-5 mb-5" id="registeration">
		<h2 class="text-center">Create an Account</h2>
		<div class="row mt-4 mb-4">
			<div class="col-md-6 offset-3">
				<form method="POST" action="" class="shadow-lg p-4">
					<div class="form-group">
						<i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-3">Name</label><input type="text" name="rName" class="form-control" placeholder="Name">
					</div>

					<div class="form-group">
						<i class="fas fa-key"></i><label for="password" class="font-weight-bold pl-3">Password</label><input type="password" name="rPassword" class="form-control" placeholder="Password">
					</div>

					<div class="form-group">
						<i class="fas fa-envelope"></i><label for="email" class="font-weight-bold pl-3">Email</label><input type="email" name="rEmail" class="form-control" placeholder="Email">
						<small>We'll never sahre your email with anyone else</small>
					</div>
					<button class="btn btn-danger mt-4 font-weight-bold btn-block shadow-sm" name="rSignup">Sign Up</button>
					<em style="font-size: 10px;">Note: By clicking Sign Up, you agree to our Terms, Data policy and Cookie Policy.</em>
					<?php if(isset($regmsg)){echo $regmsg;} ?>
				</form>
			</div>
		</div>
	</div><!--Registration From container ends here -->
