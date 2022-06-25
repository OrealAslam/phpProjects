<h1>Bubble Sort</h1>
<?php

	$arr = '';
	$arr = [12,3,51,14,21,1,17,1,31];
	$temp = '';

	echo "Array Before Sorted";
	echo "<pre>";
	print_r($arr);

	for ($i=0; $i<count($arr); $i++){ 
		
		for ($j=0; $j<count($arr)-1; $j++){ 
			if ($arr[$j] > $arr[$j + 1]){

				$temp        = $arr[$j+ 1];
				$arr[$j + 1] = $arr[$j];
				$arr[$j]     = $temp;
			}
		}
		echo "<br/>";
	}

	echo "<pre>Array after Sorted";
	echo "<br>";print_r($arr);
?>