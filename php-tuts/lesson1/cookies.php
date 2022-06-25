<?php 
$cookie_name = "user";
$cookie_value = "rate";
$cookie_expiry =time()+30;
setcookie("user", "rate",time()+30);
if(isset($_COOKIE[$cookie_name]) || isset($_COOKIE[$cookie_value])){
	echo "You rate successfully";
}
/*else{
	echo "Already rated";
}
*/

 ?>
  <!DOCTYPE html>
 <html>
 <head>
 	<title>Cookies</title>
 </head>
 <body>
 	<form method="POST" action="">
 	<button>PHP</button>
 		vs
 	<button>ASP.net</button>
 </form>
 </body>
 </html>