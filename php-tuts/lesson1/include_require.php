<?php 
echo "Before include ststement" . "<br>";
include ('incl&req.php');



//$result = add(2,10);
//echo $result;

$res = divide(14,2 , mul(4,27), add(12,1));
//$res = mul(2,3 + add(2,3));

echo $res . "<pre>";
print(gettype($res));
var_dump($res);
echo "</pre>";


?>