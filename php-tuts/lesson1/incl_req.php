<?php 

function add($w1,$w2){
	return $w1 + $w2;
}


function mul($n1,$n2){
	return $n1 * $n2;
}

function divide($q1 , $q2){

	return $q1 / $q2 * mul($q1 , $q2) + add($q1 , $q2);


}

 ?>