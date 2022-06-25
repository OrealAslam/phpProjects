<?php 
	// insertion Sort
	$arr = [12,42,21,1]; // Unsorted Array

	$length = count($arr);

// [0] => 1
    // [1] => 12
    // [2] => 21
    // [3] => 42

	for($i=1; $i<$length; $i++){

		$current = $arr[$i]; // 42
		$j = $i-1; // 2-1=1
			// true && 12 > 42
		while($j>=0 && $arr[$j] > $current){
			$arr[$j + 1] = $arr[$j];
			$j = $j-1;
		}
		$arr[$j + 1] = $current;
	}
	echo "<pre>";						
print_r($arr);

?>