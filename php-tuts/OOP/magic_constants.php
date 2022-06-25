<?php 
/*
	Magic Constants in PHP
__FILE__
__DIR__
___CLASS__
__FUNCTION__
__METHOD__	
*/

class name_of_class{
	public function get_class_name(){
		echo "The class name is => ".__CLASS__."<br>";
	}
	public function get_method_name(){
		echo "Method name is => ".__METHOD__."<br>";
	}
}
/*__FILE__ is use to get the file path*/
echo "This is file path => ".__FILE__."<br>";
//__DIR__ is used to get the file directory
echo "This is file directory => ".__DIR__."<br>";
/*__CLASS__ is used to get the class name
	Note : __CLASS__ is used only in class method i.e inside the class method.
	IMP NOTE : PHP doesn't consider class name case sensitive
*/
$obj = new nAMe_oF_clASS();
$obj->get_class_name();
$obj->get_method_name();

/*
__FUNCTION__
This method is used to get the function name.
IMP NOTE : __FUNCTION__ ka OOP sy koi talq nai ha 
we can use it in the simple POP function 
*/
function get_function_name(){
	echo "Function name is => ".__FUNCTION__."<br>";
}
get_function_name();

?>