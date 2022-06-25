<?php 
$n1 =10;
$n2 =20;
$n3 =4;
$result;

$n1+$n2;
$result = $n1 + $n2;
//echo '$result';
echo "$result"."<br>";
print(gettype($result));

$result = $n1 - $n2;
echo "$result"."<br>";
print(gettype($result));

$result = $n1 * $n2 / $n3;
echo "$result"."<br>";
print(gettype($result));


$result = $n1 * ($n2 / $n3) +$n1 * $n2;
echo "$result"."<br>";
print(gettype($result));


?>