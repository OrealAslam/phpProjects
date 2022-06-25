<?php 
session_start();
date_default_timezone_set('UTC');

// 0 1 1 2 3 5 ..... upto infinity
$limit = 7;

$n1 = 0; 
$n2 = 1;
$x  = 0;

for($i=0; $i <= $limit; $i++){ 
	 
	echo $n1 . "<br>" ;
	$n1 = $n1 + $n2;
	$n2 = $x;
	$x  = $n1;
}

// fictorial of a number
	$num = 5;
	$help = 1;
	echo "factorial of <b>$num</b> is : <br>";
	
	for ($i = $num; $i > 1; $i--){

		$help = $num * $help;
		$num--;
	}
	echo $help."<br>";

for ($k=7; $k >=1; $k--) { 
	
	for ($l=$k; $l <= 7; $l++) { 
		echo "*";
	}
	echo "<br>";
}


?>