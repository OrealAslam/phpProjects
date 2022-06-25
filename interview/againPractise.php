<?php 
//      
// $arr = [12,4,77,81,72,13,14];
// $size = count($arr);
// ------------------------------------------------------------------------------------------------

						// Binary Search

// echo '<h2>Sort using binary search</h2>';

// echo "<pre>";
// 	print_r($arr);

	// for ($i=0; $i < $size; $i++){ 								
		
	// 	for ($j=0; $j<$size -1; $j++){ 
				   
	// 		if ($arr[$j] > $arr[$j + 1]){
				
	// 			$temp = $arr[$j];
	// 			$arr[$j] = $arr[$j + 1];
	// 			$arr[$j + 1] = $temp;
	// 		}
	// 	}
	// }

// -------------------------------------------------------------------------------------------------

// 				Selection Sort


$arr = [12,4,77,81,72,13,14];
$size = count($arr);

echo '<h2>Selection Sort</h2>Before Sorted';

	echo "<pre>";
	print_r($arr);

	// $array = asort($arr);
	echo "After Sorted";
	for ($i=0; $i < count($arr); $i++) { 
		for ($j=$i; $j<count($arr)-1 ; $j++) { 
			if($arr[$j] > $arr[$j + 1]){
				$temp = $arr[$j];
				$arr[$j] = $arr[$j + 1];
				$arr[$j + 1] = $temp;
			}
		}
	}
	
	echo "<pre>";
	print_r($arr);
	
	
	function br($n){
		for($i = 0; $i<=$n; $i++){
			echo '<br>';
		}
	}
	
	br(11);

	// fibnacci series

	$number = 5;

	$n1 = 0;
	$n2 = 1;
	$x = 0;

	while($number >= 1){
		echo $n1;
		$n1 = $n1 + $n2;
		$n2 = $x;
		$x = $n1;

		$number--;
		br(1);
	}

?>