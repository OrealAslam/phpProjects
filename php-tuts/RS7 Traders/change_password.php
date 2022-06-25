<?php 
session_start();
if (isset($_SESSION['loggedin'])) {
	if (isset($_POST['change_password'])) {
		include('functions.php');
		$status = check_input($_POST);
		if ($status === true) {
			$status = validate_id($_POST);
			if ($status === true) {
				include('database.php');
				$status = old_password($_POST);
				if ($status === true) {
					$status = update_password($_POST);
					if ($status === true) {
						success("Password updated");
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
		else{
			errors($status);
		}
	}
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>Change Password</title>
	</head>
	<link href="https://fonts.googleapis.com/css2?family=Mukta&family=Nunito:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Peta&family=Mukta&family=Nanum+Gothic:wght@700&family=Noto+Sans+KR:wght@300&family=Nunito:wght@300&display=swap" rel="stylesheet">
	<style type="text/css">
		div#wrapper{width: 990px; height: 650px; margin: 0px; padding: 0px; box-sizing: border-box; position: relative;}
		div#change_password{width: 500px; height: 400px; border: 3px solid #ffee21; position: absolute; top: 50px; left: 350px; font-family: 'Mukta', sans-serif;}
		div#change_password h2{letter-spacing: 1px; text-transform: uppercase; text-align: center;}
		input[type="password"]{letter-spacing: 1px; width: 250px; margin-left: 110px; margin-bottom: 20px; font-size: 20px; padding-left: 20px; border: none; border-bottom: 2px solid black; outline: none;}
		input[type="submit"]{letter-spacing: 2px; width: 200px; margin-left: 152px; margin-top: 10px; font-size: 20px; padding: 0px 3px; cursor: pointer; font-family: 'Mukta', sans-serif; height: 40px; outline: none; border: none;}
		input[type="submit"]:hover{ border: none; outline: 2px solid#0000b3;}


	</style>
	<body>
	<div id="wrapper">
		<div id="change_password">
			<h2>Change Password</h2>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="id" value="<?php echo $_SESSION['loggedin']['id']; ?>">
				<input type="password" name="old-password" placeholder="Old Password *"><br>
				<input type="password" name="new-password" placeholder="New Password *"><br>
				<input type="password" name="confirm-new-password" placeholder="Confirm New Password *"><br>
				<input type="submit" name="change_password" value="Change Password"><br>
				
			</form>	
			
		</div>
	</div>
	</body>
	</html>
<?php	
}

?>