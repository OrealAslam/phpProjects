<?php 


	if (isset($_POST['signup'])){
		?>
		<body onload="alert('Hi welocome to my website')"></body>
		<?php

		if(($_POST['fname'] == "") || ($_POST['surname'] == "") || ($_POST['email'] == "") || ($_POST['password']) || ($_POST['gender']) || ($_POST['dob'])){
			$msg = "<div>All Fields Required</div>";
		}

			$conn = mysqli_connect("localhost", "root", "", "practical_paper");
			if (mysqli_connect_errno()){
				die($conn) . mysqli_connect_error();
			}
			
			
			$fname = mysqli_real_escape_string($conn, $_POST['fname']);
			$lname = mysqli_real_escape_string($conn, $_POST['surname']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$dob = mysqli_real_escape_string($conn, $_POST['dob']);
			$gender = mysqli_real_escape_string($conn, $_POST['gender']);

			$sql = "INSERT INTO practical (firstname, surname, email, password, dob, gender) VALUES ('$fname', '$lname', '$email', '$password', '$dob', '$gender')";

			$insert = mysqli_query($conn, $sql);
			if($insert){
				if (mysqli_affected_rows($conn)){
					mysqli_close($conn);
					$msg = "<div style='background-color: green; color: #fff; padding: 10px; margin-top: 20px; text-align: center;'>Signup successfully</div>";
				}
			}		
			else{
				mysqli_close($conn);
				$msg = "<div style='background-color: #ff4d4d; color: #fff; padding: 10px; margin-top: 20px; text-align: center;'>email already exists</div>";
			}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="main-wrapper">
		<div class="form-div">
			<div class="actual-form">
				<h3>Signup</h3>
				<small>it's quick and easy</small>
				<div>
					<form method="POST" action="">
						<div class="combine-fields">
							<input type="text" name="fname" class="field-1" placeholder="First name">
							<input type="text" name="surname" class="field-2" placeholder="Surname">
						</div>

						<input type="email" name="email" class="email" placeholder="Enter email" required><br>

						<input type="password" name="password" placeholder="New password">

						<div class="date-section">
							<label for="dob" style="margin-left: 12px; font-size: 16px;">Date of Birth</label><br>
							<input type="date" name="dob" id="dob">
						</div>
						<label style="font-size: 16px; margin-left: 12px;">Genders</label><br>
						<div class="gender-section">							
							<div class="radio-option1">Female <input type="radio" name="gender" value="female"></div>
							<div class="radio-option2">Male <input type="radio" name="gender" value="male"></div>
							<div class="radio-option3">Custom <input type="radio" name="gender" value="custom"></div>
							
						</div>
						<br>
						<small class="agreement">By clicking Signup you agree our <span style="color: blue;">Term Data Policy</span> and <span style="color: blue;">Cookie Policy</span> you mayrecieve sms notifications from us any time.</small>
						<br><br>
						<button type="submit" name="signup">Sign Up</button>
					</form>
					<?php if(isset($msg)){echo $msg;} ?>
				</div>
			</div>

		</div>
	</div>
</body>
</html>