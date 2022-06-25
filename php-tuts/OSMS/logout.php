<?php 
	session_start();
	session_destroy();
	setcookie('adminemail', time() - 86400);
	setcookie('adminpassword', time() - 86400);
	setcookie('useremail', time() - 86400);
	setcookie('userpassword', time() - 86400);
	echo "<script>location.href='index.php'</script>";
	
?>
