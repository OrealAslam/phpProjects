<?php 

// $a = 10;
// $b = 20;
// $c;

// echo "<h2> Using Third Variable (kitchen's rule) </h2>";

// echo "Before Swapping<br><br>";
// echo "Value of a : ". $a ."<br>Value of b : " . $b . "<br><br>";

// logic
// $c = $a;
// $a = $b;
// $b = $c;

// echo "After Swapping<br><br>";
// echo "Value of a : ". $a ."<br>Value of b : " .$b;


// echo "<h2> Without using Third Variable </h2>";

// echo "Before Swapping<br><br>";
// echo "Value of a : ". $a ."<br>Value of b : " . $b . "<br><br>";

// $a = $a + $b; // 30
// $b = $a - $b; // 10
// $a = $a - $b; //20


// echo "After Swapping<br><br>";
// echo "Value of a : ". $a ."<br>Value of b : " .$b;


$a = '23'; // 3
$i = 0;
$b = 1;
while (isset($a[$i])){
	echo $a[$i]."<br>";
	$i++;
	$b++;
}
echo "<strong>Total Characters : </strong>";
echo $b - 1 ;
?>