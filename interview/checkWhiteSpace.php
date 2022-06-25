<?php 

// 	Login NO : 1

// $str = 'Oreal Aslam  Chohan';
// $n = 0;
// $space = 0;
// $spaceArr = [];
// while(isset($str[$n])){

// 	$GLOBALS['spaceArr'][$n] = $str[$n];
// 	$n++;
// }

// foreach ($spaceArr as $key => $value) {
// 	if($spaceArr[$key] == ' '){
// 		$space++;
// 	}
// }
// echo $space;


// Logic NO : 2

$str = 'Oreal Aslam';

// echo ctype_alnum($str);
if(ctype_space($str)){echo "space";}

//OLD CODE---------------------------------------------------------------------------
		
// $n = 0;
// $arr = [];
// $space = 0;

// while (isset($str[$n])){

// 	$GLOBALS['arr'][$n] = $str[$n];
// 	$n++;
// }

// foreach ($GLOBALS['arr'] as $key => $value){
// 	if ($GLOBALS['arr'][$key] == ' '){
// 		$space++;

// 	}
// }
// echo "Total white spaces are : " . $space; 


// echo "<pre>";
// print_r($GLOBALS['arr']);

?>
