<!DOCTYPE html>
<html>
<head>
	<title>Validate signup</title>
	<style type="text/css">
		fieldset{width: 250px;}
		legend{color: red;}
		form{margin-bottom: 150px;}
		#wrapper{background-color: #21618C; width:350px; position: relative; top: 150px;}
		#input{font-size: 20px; border-radius: 17px; border: none; padding-left: 20px;}
		#button{font-size: 24px; border-radius: 15px; padding: 5px; border: none;}
		#button:hover{width: 100px; background-color: red; color: white; font-weight: bold; cursor: pointer;}
		#error, #success{text-align: center; margin-top: 50px; font-size: 26px; font-family: sans-serif; font-weight: bolder;}
		#error{color: red;}
		#success{color: green;}

	</style>
</head>
<body>
	<center>
		<div id="wrapper">
			<form method="POST" action="valid_signup.php">
			<fieldset>
				<legend><h3>Register yourself</h3></legend><br>
				<input type="text" name="username" placeholder="username" id="input"><br><br>
				<input type="text" name="email" placeholder="email" id="input"><br><br>
				<input type="text" name="confirm" placeholder="confirm email" id="input"><br><br>

				<input type="password" name="password" placeholder="password" id="input"><br><br>
				<input type="submit" name="signup" value="Signup" id="button">
			</fieldset>
			
		</form>
		</div>
		
	</center>
<!-- Displaying success messages -->
	<div id="success">
		<?php 
			if (isset($_REQUEST['success'])) {
				echo $_REQUEST['success'];
			}
		?>
		
	</div>
<!-- Displaying error messages -->
	<div id="error">
		<?php 
			if (isset($_REQUEST['error'])) {
				echo $_REQUEST['error'];
			}
		?>
		
	</div>
</body>
</html>

<!-- php code goes here -->

<?php 

	if (isset($_POST['signup'])) {
		$name          = $_POST['username'];
		$mail          = $_POST['email'];
		$confirm_email = $_POST['confirm'];
		$password          = $_POST['password'];

		// Include of functions file
	include('functions.php');
		// validate and sanitize user input
		//---------------------SANITIZATION-------------------------------------------------------
		$sanitize_name  =  sanitize_string($name);
		$sanitize_mail  = sanitize_email($mail);
		$sanitize_email = sanitize_email($confirm_email);
		$pass           = sanitize_string($password);
		//---------------------VALIDATION---------------------------------------------------------
		//------TO VALIDATE ALL OF THE ABOVE VARIABLES WE USE NESTED IF---------------------------

		if ($valid_mail = validate_email($sanitize_mail) && $confirm_valid = validate_email($sanitize_email)) {
				//-------HERE WE WESTABLISH CONNECTION WITH DB------------------------------------
				$connection = mysqli_connect("localhost", "root", "", "login");
				if (mysqli_connect_errno()) {
					die(mysqli_connect_error());
				}
				//-------DB QUERY GOES HERE
				$sql    = "INSERT INTO`signup`(`name`, `email`, `confirm_mail`, `password`) VALUES(?,?,?,?)";
				$stmt   =  mysqli_prepare($connection, $sql);
				//-------HERE WE BIND OUR PARAMETERS
				if ($stmt) {
					mysqli_stmt_bind_param($stmt, 'ssss',$sanitize_name, $valid_mail, $confirm_valid, $pass );
					$execute = mysqli_stmt_execute($stmt);
						if ($execute) {
							header("Location: valid_signup.php?success= Signup successfully!!");
							// Close the statement object
							mysqli_stmt_close($stmt);
							// Close DB connection
							mysqli_close($connection);
						}

						else{
						header("Location: valid_signup.php?error: Error signup failed!!");
						}
				}

			
		}
		else{
			header("Location: valid_signup.php?error= Invalid email");
		}

		header("Location: valid_signup.php?success= Signup successfully!!");
	}

?>
