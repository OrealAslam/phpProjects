<?php 
$new = 0;
$array = [];

echo "Array Before Filled<br><br>";
$arr = [
	'id' => 1, 'name' => 'Oreal Aslam', 'email' => 'orealaslam@gmail.com', 'password' => '123',
	['id' => 2, 'name' => 'Osama Aslam', 'email' => 'osamaaslam@gmail.com', 'password' => '123'],
	['id' => 3, 'name' => 'Omama Aslam', 'email' => 'omamaaslam@gmail.com', 'password' => '123'],
	['id' => 4, 'name' => 'Nadir Ali', 'email' => 'nadir@gmail.com', 'password' => '123'],
];


foreach ($arr as $key => $value){
	if (is_array($value)){
		foreach($value as $index => $val){
			if($index === 'name'){
				$array[$new] = $value[$index];
				$new++;
				// echo $value[$index]. "<br>";
			}
		}
	}
	if(!is_array($arr[$key])){
		if($key == 'password'){
			echo $arr[$key] . '<br>';
		}
	}
}

echo "Array After Filled<br><br>";

echo "<pre>"
;
print_r($array);
?>