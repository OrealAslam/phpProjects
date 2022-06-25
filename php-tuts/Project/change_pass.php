
	
<?php 
if (isset($_POST['change'])) {
	include ('functions.php');
	$status = check_password($_POST);

	if ($status === true) {
		include ('database.php');

		$status = check_old_pass($_POST);
		if ($status === true) {
			$status = update_password($_POST);
			if ($status === true) {
				success("Updated");
				
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
session_start();
if (isset($_SESSION['login'])) {

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Change Password</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;300;500&family=Playfair+Display&display=swap" rel="stylesheet">
		<style type="text/css">
			#div{ width:100% ; height: 150px; line-height:150px; font-family: 'Playfair Display', serif; text-align: center; background-color:#3377ff; opacity: .7; border-radius: 0px 25px 0px 25px;}
			#div h1{text-shadow: 0px 2px 5px  red; letter-spacing: 1px;}
			#div:hover{background-color:  #0055ff; cursor: pointer; color: #fff; text-shadow: 5px 0px 2px red; font-family: 'Playfair Display', serif; letter-spacing: 4px;}
			#form{text-align: center; margin-top: 30px; height: 200px;}
			input[type="password"]{width: 250px; padding-left: 30px; height: 40px; line-height: 20px; margin-bottom: 15px; border: none; border-bottom: 2px solid #ff0000; outline: none; font-family:'Playfair Display', serif; font-size: 18px; background-color: #f0f5f5; }
			input[type="submit"]{width: 200px; font-family:'Playfair Display', serif; font-size: 18px; margin-top: 20px; border: none; padding: 10px 10px; background-color:#d1e0e0; cursor: pointer; outline: none;}
			input[type="submit"]:hover{border: 2.5px solid #ff1a1a; border-radius: 7px;}

		</style>
	</head>
	<body>
		<div id="div"><h1>Change Password</h1></div>
	<div id="form">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="id" value="<?php echo $_SESSION['login']['id']; ?>">
			<input type="password" name="old-password" placeholder="enter old password"><br>
			<input type="password" name="new-pass" placeholder="new password"><br>
			<input type="password" name="confirm-pass" placeholder="confirm password"><br>
			<input type="submit" name="change" value="Change Passsword">
		</form>
	</div>
	</body>
	</html>

<?php	
	
}
else{
	header("Location:login.php");
}

 ?>