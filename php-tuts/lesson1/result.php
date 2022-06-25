<?php 

if($_POST['userid'] !="" AND $_POST['pass'] !=''){
	echo $_POST['userid'];
	echo $_POST['pass'];

}else
{
	echo "Missing user_name or password";
}


 ?>