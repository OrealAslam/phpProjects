<?php 
session_start();
if (isset($_SESSION['loggedin'])) {
	echo "<h1>"."Welcome<br>".$_SESSION['loggedin']['fullname']."</h1><br><br>";
	echo "<a href='Logoff.php'>Logoff</a> | <a href='change_password.php'>Change Password</a>" ;
}else{
	header("Location: traders_login.php");
}


?>