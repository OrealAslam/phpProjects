<?php 

// *******
// ******
// *****
// ****
// ***
// **
// *

for ($i=1; $i<=7; $i++){ 
	for($j=7; $j>=$i; $j--){ 
		echo "*";
	}
	echo "<br>";
}
echo "<br>";echo "<br>";
// *
// **
// ***
// ****
// *****
// ******

for($i=1; $i<=7; $i++){ 
	
	for ($j=1; $j<=$i; $j++){ 
		echo "*";
	}
	echo "<br>";
}


// 1 11 111 1111
echo'<br>';echo'<br>';

for($i=4; $i>=1; $i--){ 

	for($j=$i; $j>=1; $j--){ 
		echo '1';
	}
	echo "<br>";
}
	echo "<br>";	echo "<br>";
// print a SQUARE * pattren using loop
	echo "print a SQUARE * pattren using loop<br><br><br>";

for($i=1; $i<=6; $i++){ 

	for($j=1; $j<=12; $j++){ 
		echo '*';
	}
	echo "<br>";
}
echo "<br>";echo "<br>";echo "<br>";



// Fabonacci Series

echo "Fabonacci Series<br>";

$limit = 5;
$n1 = 0;
$n2 = 1;
$x  = 0;


for ($i=0; $i <= $limit; $i++) { 
	
	echo $n1;

	$n1 = $n1 + $n2;
	$n2 = $x;
	$x  = $n1;
	echo "<br>";
}

?>
