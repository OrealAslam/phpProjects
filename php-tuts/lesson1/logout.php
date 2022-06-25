<?php 
	session_start();
	if (isset($_SESSION['login'])) {
		$_SESSION = [];
		session_destroy();
		header("Location: practise_login.php");
	}
	else{
		header("Location: practise_login.php");
	}

?>