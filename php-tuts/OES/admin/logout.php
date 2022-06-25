<?php 
session_start();
if (!isset($_SESSION['admin'])){
	header("Location: admin_login.php");
}else{
session_destroy();
unset($_SESSION);
// setcookie('adminemail', time() - 86400);
// setcookie('adminpassword', time() - 86400);

echo "<script>location.href='../index.php'</script>";
}
?>