<?php

/*
Notice:
		sessions always stored on server site  whereas 
		cookies are always stored on client site.

session_start();    //this should be the very first line of your script

Creating a session:
$_SESSION['session_name'] = you can assign it any thing you want;

Reading a session:

if you want to access a session

echo $_SESSION['session_name'];		

*/

session_start();
$_SESSION['user_data'] = array("user_name"=>"Oreal", "account_password"=>"dr11crd12082dgw");
if(isset($_SESSION['user_data'])){
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
}
else{
	print "Session not available";
}
//unset($_SESSION['user_data'])  //this is used to unset the session
//session_destroy();   //this is used to destroy / delete the session file in tmp folder

?>
