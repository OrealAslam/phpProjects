<?php 
session_start();
	if (isset($_SESSION['loggedin'])) {
		$_SESSION['loggedin'] = [];
		unset($_SESSION);
		session_destroy();
		setcookie(session_name(), time()-15, "/");
		header("Location: traders_login.php");
	}
	else{
		header("Location: traders_login.php");
	}

?>