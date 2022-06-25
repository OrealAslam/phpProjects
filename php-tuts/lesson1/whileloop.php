<?php
/*
Syntax of while loop :

	staring staement;
	while (conditon){
	statement1;
	statement2;
		.
		.
		.
		.
		.
		.
		.
		.
	statement_n..;
    
    incremenr / decrement; 		
	}
*/
/*$a = 0;
while ( $a<= 100) {

		if($a%2==0){
			echo "even";
		}


	echo $a . "<br>";
	$a ++;

}
*/

//While loop with an array



/*
$_1=1;
while ( $_1<= 10) {
	if($_1%2==0){
		echo "even";
	}
	echo  $_1 . "<br>";
	$_1++;

}
*/

//Array in while loop :


/*
$abc =1 ;
$array = array();
while ($abc<=10) {
	
	echo $array[$abc];
	$array[$abc-1] = $abc;
	$abc++;
	echo "<pre>";
	print_r($array);
	echo "</pre>";	
}
*/

//print table of 5
$ans;
$table = 2;
$i  = 1;
for ($i=1; $i <=10; $i++) { 
$ans = $table *$i;
echo $ans . "<br>";
	
}


?>