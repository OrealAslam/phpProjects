<?php 

 function __autoload($className){
	$path = "classes/";
	$ext  = ".php";
	include $path.$className.$ext;
	
}



$obj = new Person;
// $obj2 = new Employee;
// $obj3 = new Department();
//echo "<br>Name is : ".$obj->name = "Oreal";
// echo "<br>".$obj->age = 21;
// $obj->hight = "5.8ft";
//$obj->country = 'USA';
//echo "<br>".$obj->age = '22';
echo "<br>".$obj->father = 'Rana Amir';
echo $obj->function;
//echo "<br>";
$obj->function = 'sports';


?>