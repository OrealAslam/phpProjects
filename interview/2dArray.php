<?php 
// Multi - Dmentional Arrays in PHP

// $arr = array(2,array(1,2,3,4),3,4,6,7,8,9);

// for ($i=0; $i <count($arr); $i++) { 
	
// 	if(is_array($arr[$i])){
// 		for ($j=0; $j<count($arr[$i]); $j++) { 
			
// 			echo $arr[$i][$j];
// 		}
// 	}
// 	else{
// 		echo $arr[$i];
// 	}
// 	echo "<br>";
// }


$arr = array(

			array("Name" => "Oreal", "Designation" => "Laravel Developer", "Age" => 23),
			array(12,31,54,46,78,77,90),
			array(31,52,53)
		);	


foreach ($arr as $key => $value) {
	foreach($arr[$key] as $myKey => $info){
		echo $myKey ."=>". $info;
		echo "<br>";
	}
	echo "<br>";
}



?>