<?php

// Indexd array concept:
$arr1 = array(1,7,11,array(array(0,11,17,array(15,16),12,18)));
echo "<pre>";
print_r($arr1);
echo "<pre>";

echo "Now we have to display no: 16 "."</br></br></br>";


echo $arr1[3][0][3][1]."</br></br>";

echo $arr1[3][0][5];

//------------------------------------------------------------------

// Associative array concept:

$asset = ['1st'=>47, '2nd'=>53, '3rd'=>107,'arr'=>array('first'=>21, 'second'=>51,'third'=> array(17)), '4th'=>95];
echo "<pre>";
print_r($asset);
echo "</pre>"."</br></br>";

echo $asset[arr][third][0];



?>