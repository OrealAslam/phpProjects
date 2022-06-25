<?php 
	session_start();
	if (isset($_POST['submit'])) {
			include('practise_signup_functions.php');
			$status = check_password($_POST);
			if ($status === true) {
				// check old password
				include('practise_signup_DB.php');
				$status = check_old_password($_POST);
				if ($status === true) {
					$status = update_password($_POST);
					if ($status === true) {
						success("password updated");
					}
					else{
						error($status);
					}
				}
				else{
					error($status);
				}
			}
			else{
				error($status);
			}

		}

if (isset($_SESSION['login'])) {
?>
<?php 
      echo "<h1>Change Password</h1>";
		echo "Welcome" . $_SESSION['login']['username'];
		echo "<br><br><br><a href='change_password.php'>Change Password</a> | <a href='logout.php'>Logout</a>";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Practise Signup</title>
	<style type="text/css">
		#error, #success{text-transform: uppercase; letter-spacing: 2px; font-size: 22px; font-family: sans-serif;}
		fieldset{width: 175px;}
		#error{color: red;}
		#success{color: green;}
	</style>
</head>
<body>
	<center>
		<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
		<fieldset>
			<legend>Change Password</legend>
			<input type="hidden" name="id" value="<?php echo $_SESSION['login']['id'] ?>">
		<input type="password" name="old_password" placeholder="enter old password"><br><br>
		<input type="password" name="new_password" placeholder="New password"><br><br>
		<input type="password" name="confirm_password" placeholder="Confirm new password"><br><br>
		<input type="submit" name="submit" value="Change Password">		
		</fieldset>
		
		</form>
	</center>
	

</body>
</html>


<?php	
	}
	else{
		header("Location: practise_login.php");
	}
?>