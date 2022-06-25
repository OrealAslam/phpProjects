<?php 


function total(){

	static $var = 1;
	echo $var . " <br> ";
	$var++;	
}

for ($i=1; $i <=10 ; $i++) { 
	total();
}

?>