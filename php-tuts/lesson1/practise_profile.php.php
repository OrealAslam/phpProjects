<?php 
	session_start();
	if (isset($_SESSION['login'])) {
		echo "<h1>Profile Page</h1>";
		echo "Welcome" . $_SESSION['login']['username'];
		echo "<br><br><br><a href='change_password.php'>Change Password</a> | <a href='logout.php'>Logout</a>";
	}
	else{
		header("Location: practise_login.php");
	}

?>