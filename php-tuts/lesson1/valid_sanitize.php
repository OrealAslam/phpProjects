<?php 
// Validate and Sanitize email using filter
$email = "orealaslam@gmail.com";
$valid = filter_var($email, FILTER_VALIDATE_EMAIL)."<br>";

if($valid!=FALSE){
	echo "Valid email"."<br>";

}
else{
	echo "Oops!.. invalid email"."<br>";
}
echo $valid; 

// Validate float/double using filter
/*
$price =  11;
$validate = filter_var($price, FILTER_VALIDATE_FLOAT);
if($validate == FALSE){
	echo "Oops!!.. Invalid price".$price;
}
else{
	echo "valid price".$price . "<br>";
}
// to get type of a variable i.e int,float/double, string we have a pre-defined function in php name as 'gettype();'

echo gettype($price);
*/
 ?>