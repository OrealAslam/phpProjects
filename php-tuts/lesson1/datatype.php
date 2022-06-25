<?php 

$_var ="My name is Oreal";
print(gettype($_var))."<br>";
//Here gettype(); function us used which gives us the data type of the variable 
$var =1;
print(gettype($var))."<br>";

$array =1.0;
print(gettype($array))."<br>";

$bool =false;
print(gettype($bool))."<br>";

$array = array(1,2,3,4,5,6,7,8,9,10);
print(gettype($array))."<br>";

//we can pass more than one parameters to echo statement but without parenthesis

echo "I" , "love" , "Pakistan"."<BR>";
$city ="LAHORE";

//we cannot pass more than one parameter in print statment.okey!

print"I LIVE IN $city PKAISTAN"."<BR>";

print(gettype($city))."<br>";



?>