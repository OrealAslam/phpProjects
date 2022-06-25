<?php 
$n1 = 30;
$n2 = 30;
var_dump($n1 === $n2)."<br>";	


//$value1 = 87;
//$value2 = "87";
//var_dump($value1 === $value2);

$value1 = 7;
$value2 = "87";
var_dump($value1 !== $value2)."<br>";

/* Conditional Operators:
-------------------------
	 AND , and , && ( all are consider as true logical operatorrs).

	 					----------------
	 OR , or , ||(consider as true even uppercase or lowercase).
		
						-----------------

	 XOR (If both conditions are true the entire result will consider as false.
	 		If one condition is true and other is false then the entire result will consider as true).
--------------------------------------------------------------------------------------------------*/

$val1 = 56;
$val2 = 56;

$val3 = 516;
$val4 = 516;

		var_dump($val1 == $val2 XOR $val3 == $val4);

			



?>