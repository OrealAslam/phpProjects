<?php 

$str = "my  name is Oreal";
$n = 0;
$arr = [];
$space = 0;

while (isset($str[$n])){
	$arr[$n] = $str[$n];
	$n++;
}

foreach ($arr as $key => $value){
	if($arr[$key] == ' ' AND $arr[$key + 1] == ' '){
		$space = 1;
		break;
	}
}

if($space == 1){
	echo "excat two spaces found in a string";
}

?>