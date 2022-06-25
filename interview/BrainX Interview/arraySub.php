<?php 

$arr1 = [12,21,31,124,234,34];

$arr2 = [10,12,18,21,54,3];

$resArray = [];
echo "<pre>";
print_r(subFunc($arr1, $arr2, $resArray));
// $n;
// $array = [];

// without passing array to a function.


// foreach ($arr1 as $key => $val1){

// 	$n = $key;

// 	$array[$n] = $arr1[$key] - $arr2[$key];

// }

// echo "<pre>";
// print_r($array);

function subFunc($arr1, $arr2, $resArray){

	foreach ($arr1 as $key => $value) {
		$n = $key;

		$resArray[$n] = $arr1[$n] - $arr2[$n];
	}

	return $resArray;
}

?>