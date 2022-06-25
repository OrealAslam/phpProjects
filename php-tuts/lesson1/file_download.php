<!DOCTYPE html>
<html>
<head>
	<title>File Download</title>
	<meta charset="utf-8">

<style type="text/css">
	#success{margin-top: 40px;}
	#error{margin-top: 40px;}
	#success{color: green; font-size: 26px;
		font-weight: bold;}

		#error{color: red; font-size: 26px;
		font-weight: bold;}
	
	#wrapper{background-color: #fff; height: 750px;}
	
	.form{position: absolute; margin-top: 100px; margin-left: 50%; justify-content: center; }
	.heading{color:  #ff0080; font-size: 22px;}
	
	input{outline: none;}
	
	input[type="text"]{width: 250px; font-size: 16px; border:none; border-bottom: 2px solid #ff0080; padding: 3px 10px 3px 10px; margin-bottom: 15px;}
	input[type="password"]{width: 250px; font-size: 16px; border:none; border-bottom: 2px solid #ff0080; padding: 3px 10px 3px 10px; margin-bottom: 10PX;}
	input[type="password"]::a active{border:0px;}
	
	input[type ="checkbox"]:checked{background-color: #ff0080; border-color: #ff0080;}

	button{width: 250px; color: #fff; background-color: #ff0080; margin-top: 10px; border: none; text-decoration: none; font-size: 20px; position: relative; outline: none; cursor: pointer; padding: 3px;}

</style>	
</head>
<body>

	<div id="wrapper">
		<div class="form">
			<form method="POST" action="submit.php">
			<p class="heading">Sign Up</p>
				<label class="heading">User Name:</label><br>

				<input type="text" name="username" placeholder="Full Name" required><br>

				<label class="heading">Password:</label><br>

				<input type="password" name="password" placeholder="Password" required><br>

				<label class="heading">Email:</label><br>

				<input type="text" name="email" placeholder="Enter Email" required><br>
				<!--yaha pr vale server side py jye gi jb k 'name'= jo bhi ha wo DB ma column ho ga  -->
				
			
				
						<!--Remenber: yaha pr  yeh line(I agree term and conditions) sirf user ko dikhane k liye ha lakn server side py yeh info/value (value="agreement") jye gi-->
					 
			</label>
				<br>

			<button type="submit" name="btn">Sign Up</button>
			
			</form>
			<div id="success">
			<?php if (isset($_GET['success'])) {
				echo $_GET['success'];
			} ?>
		</div>

		<div id="error">
			<?php if (isset($_GET['error'])) {
				echo $_GET['error'];
			} ?>
		</div>
		</div>
	</div>


</body>
</html>