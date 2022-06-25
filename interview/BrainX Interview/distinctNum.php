<?php 

$arr = [1,1,2,3,4,4,5,6,7,78,8,8];
$unique = [];
// $index = 0;

// while($index <= 999){
// 	$num = mt_rand(0,1000);
// 	$arr[$index] = $num;
// 	$index++;
// }

$len = count($arr); 

for ($i=0; $i <$len ; $i++) { 
	$c = 0;

	for ($j=0; $j < $len; $j++) { 
		
		if ($i != $j){
			if ($arr[$i] == $arr[$j]) {
				$c++;
			}
		}
	}
	if($c == 0){
		// $unique[$i] = $arr[$i];
		echo $arr[$i]. "<br>";
	}
}

// print_r($unique);
 
?>