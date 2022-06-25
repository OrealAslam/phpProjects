<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php?error=nlogin");
}
$_SESSION = [];
session_destroy();
header("Location: index.php");

?>