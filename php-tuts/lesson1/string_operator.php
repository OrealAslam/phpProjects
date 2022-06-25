<?php 


//string operator always works on string data type

//you must have to initilize variable as string data type to use string operator.

//-------------------------------------------------------------------------------


$statement_1 = "I Love Programming";
$statement_2 = "I do it 24/7";
$statement_3 = "This is my hobby";
$statement_3.=". This is assignment concatenation operator";
$statement_2 .=". This is really very hard job";
$result = $statement_1.$statement_2.$statement_3;

//echo "$statement_1" . "$statement_2"."</br>";

echo "$result" . "</br>";

$statement_3 = "I Love Programming";
$statement_4 = "I do it 24/7";
//$statement_3 = "This is my hobby";
$result = $statement_1.$statement_2.".This is my hobby";

//echo "$statement_1" . "$statement_2"."</br>";

echo "$result" . "</br>";



?>