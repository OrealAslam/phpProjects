<?php 
session_start();
if (!isset($_SESSION['userlogin'])){
	echo "<script>location.href='login.php'</script>";
}
session_destroy();
unset($_SESSION);
// setcookie('adminemail', time() - 86400);
// setcookie('adminpassword', time() - 86400);

echo "<script>location.href='../index.php'</script>";
?>