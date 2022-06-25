<?php 
/*$i = 1;
for ($i=0; $i <= 1000; $i++) { 
	echo $i."<br>";
}
*/

$actual = 1;
$arr = [];
for ($actual=1; $actual <= 1000; $actual++) { 
	echo $arr[$actual-1] = $actual . "<br>";
}

echo "Now look at the index locations" . "<br>";


echo "<pre>";
print_r($arr);
echo "</pre>"; 


?>