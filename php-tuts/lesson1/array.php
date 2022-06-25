<?php 
$arr = array(12, 34,62,89,23);

echo "<pre>";
print_r($arr);
echo "</pre>";
$arr1 = [$arr, "Pkaistan"];
$second= [$arr,array(array(array("Cat", "Dog")))];
echo "<pre>";
print_r($second);
echo "</pre>". "<br>";
echo $second[1][0][0][1];
$array =[0,1,2,3,4,45,5,65,6,6,7,78,9,23,35,46,4576,587,68,6798,879,7,456,43,5432,4,324,21,3];
$actual = [$array];
echo "<pre>";
print_r($actual);
echo "</pre>";
echo $actual[0][24];


//------------------------------------------------------------------------------------------------


$newone = array(1,21,38,92, array(0, array(array(21,45,38, array(12)))));

echo "<pre>";
print_r($newone);
echo "</pre>"."</br>";

echo $newone[4][1][0][0];
