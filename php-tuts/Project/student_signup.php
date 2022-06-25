<?php 
	if (isset($_POST['signin'])) {

		include('functions.php');
		$status = check_input($_POST);
		
		if ($status === true) {

			$status = valid_inputs($_POST);
			if (is_array($status)) {
				
				include('database.php');
				$status = get_info($_POST);
				if ($status === true) {

					success("Signin");
					echo "Login please..!!";
					header("Location: login.php");
				}
				else{
					errors($status);
				}				
			}
			else{
				errors($status);
			}
		}
		else{
			errors($status);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login System</title>
	<meta charset="utf-8">
	<meta viewport="device-width" initial scale="1.0px">
	<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;300;500&family=Playfair+Display&display=swap" rel="stylesheet">
	<style type="text/css">
	*{margin: 0px; padding: 0px; box-sizing: border-box;}
	#img{
		position: absolute; top: 100px; left: 150px; height: 570px; display: inline-flex; float: left;  
	}
	#img > img{
		height: 100%;
		width: 100%;
	}
	 .form{
		background-color: #238cB4 ;
		position: absolute;
		top: 100px;
		left: 650px;
		width: 550px;
		height: 570px;
		outline: 4px solid #fff;
		
		
	}
	h1{
		font-family: 'Playfair Display', serif;
		margin-top: 20px ;
		margin-left: 110px;
		margin-bottom: 20px;
		color: #fff;

	}
	input[type = "text"], input[type = "password"], input[type = "date"], input[type = "email"]{
		
		width: 90%;
		height: 34px;
		font-size: 22px;
		font-weight: bold;
		line-height: 34px;
		font-family: 'Playfair Display', serif;		border: none;
		padding-left: 55px;
		margin-bottom: 20px;
		margin-left: 26px;
		border-radius: 10px;
		outline: none;
		transition: .7s;
	}

	input[type = "radio"]{
		margin-bottom: 30px;
		margin-left: 50px;
		font-family: 'Playfair Display', serif;	
		font-size: 24px;

	}
		
	input[type="submit"]{
		
		width: 150px;
		height: 40px;
		font-size: 24px;
		font-family: 'Playfair Display', serif;
		color: #000000;
		margin: 0px 0px 20px 200px;
		border-radius: 10px;
		border: none;
		cursor: pointer;
	}
	input[type="submit"]:hover{background-color: #DAF7A6; transition: .4s; opacity: .3;}	

	#gender{color: #fff; font-size: 24px; font-family: 'Playfair Display', serif; margin-left: 10px;}
#error, #success{font-family: 'Playfair Display', serif; letter-spacing: 1px; font-size: 16px;}
	#error{color: red;}
	 #success{color: green;}	
	</style>
</head>
<body>
<div id="wrapper">
	<div id="img">
		<img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
	</div>
		
	<div class="form">
		
				<span ><h1>Register Yourself</h1></span>

			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

				
				<input type="text" name="username" placeholder="enter username" maxlength="25"><br>	

				<input type="password" name="password" placeholder="enter password"><br>

				
				
				
				<input type="email" name="email" placeholder="enter email" maxlength="50"><br>

				
				<input type="date" name="dob" placeholder="date of birth"><br>

				
				<input type="text" name="phone" placeholder="phone number" maxlength="11"><br>

				<input type="radio" name="gender" value="male"><span id="gender">Male</span>

				<input type="radio" name="gender" value="female"><span id="gender">Female</span><br>

				<input type="submit" name="signin" value="Register">
			</form>
			<div id="success">
				<?php 
					if (isset($_GET['success'])) {
						echo "SignUp!! successfully";
						header("Location:login.php");
					}
				 ?>
			</div>

			<div id="error">
				<?php 
					if (isset($_GET['error'])) {
						echo "SignUp Failed!!";
						header("Location:student_signup.php");
					}
				 ?>
			</div>
		
	</div>
		
</div>
	
</body>
</html>
