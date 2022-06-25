<?php 

/*
Syntax of  functions with parameters
------------------------------------

	syntax : 
	     		function(key_word) function_name(parameter1 , parameter2,.....)
	     		//jahn pr function define krna ha uss k parameters k baad semicolon(;) ni lgana.
	     		{
					block of statements(n);
	     		}

	 Example: 
	   				function display($num1 , $num2)
	   				{
						block of statements(n);
	   				}   


	Function Call:
	 					function_name (parameter list(if available) );
	 					//function call must be end with a semicolon(;) 		

*/

//------------------------------------------------------------------------------------------------


/*function add($sum1 , $sum2)

{
	$result = $sum1 + $sum2;
	echo $result;  
}

function sub($sum1 , $sum2)

{
	$result = $sum1 - $sum2;
	echo $result;  
}

function mul($sum1 , $sum2)

{
	$result = $sum1 * $sum2;
	echo $result;  
}

function divide($sum1 , $sum2)

{
	$result = $sum1 / $sum2;
	echo $result;  
}  

function modulus($sum1 , $sum2)

{
	$result = $sum1% $sum2;
	echo $result;  
}

$a = 2;
$b = 7;
add(1002,721);
*/


function quad($a,$b,$c)
{
	$x = -$b+($b*$b -4*$a*$c) / 2*$a;
	$y = -$b-($b*$b -4*$a*$c) / 2*$a;
	echo $x . "<br>";
	echo $y;
}

quad(13,1,719) ."<br><br>";
echo "helo". '<br>';








?>