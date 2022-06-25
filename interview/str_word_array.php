<?php 

error_reporting(0);

$str = 'Oreal Aslam Chohan';

$arr = [];
$index = 0;

// implementing underline logic of cresenTech interview question.
// i.d add each word of string in a seprate index of an array.

for ($i=0; $i<strlen($str); $i++) { 
	GLOBAL $index;

	$arr[$index] .= $str[$i];

	if ($str[$i] == ' '){
		$index ++;
	}
}
echo "<pre>";
print_r($arr);


// The above task can be performed using explode('delimiter', string) function

$array = explode(' ', $str);
print_r($array);
?>





