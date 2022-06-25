<?php 
	$arr = [12,3,21,15,42,21,1]; //[1,3,51,21,12], [1,3,12,21,51]
	$temp = '';
	
	
	
		for($i=0; $i<count($arr); $i++){ 
			
			for($j=0; $j<count($arr); $j++){

				if($arr[$j] > $arr[count($arr)-1]){

					$temp    = $arr[$j];

					$arr[$j] = $arr[count($arr)-1];

					$arr[count($arr)-1] = $temp;
				}
			}	
		}

	echo "After Sortring";
	echo "<pre>";
	print_r($arr);
?>