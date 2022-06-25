<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		fieldset{width: 150px;}
		#login{width: 250px; float: right;}
	</style>
</head>
<body>
<div id="login">
	<form action="login.php" method="POST">
		<input type="text" name="user_name" placeholder="username">
		<input type="password" name="password" placeholder="password">

	</form>
	
</div>
<center>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<fieldset>
			<legend>Register youurself</legend>
			<input type="text" name="username" placeholder="username" required><br><br>
			<input type="text" name="email" placeholder="email" required><br><br>
			<input type="password" name="password" placeholder="password" required><br><br>
			<input type="submit" name="submit" value="Login">
		</fieldset>
	</form>
</center>
	
	
</body>
</html>
<!-- php script goes here -->

<?php 
  if (isset($_POST['submit'])) {
  	  $name = $_POST['username'];
  	  $email = $_POST['email'];
  	  $pwd   = $_POST['password'];

  }
?>