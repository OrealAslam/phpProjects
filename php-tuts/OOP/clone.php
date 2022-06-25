<?php 
/*
Clone:
	   It is triggered on newely cloned object
	   it is called automatically when you crete a duplicate(copy) of an object
	   For example
	   let us take a variable $a = 2 and $b=$a, it means $a=2 and $b is also '2', suppose we change the value od $a to '3' it means the value of $b is also changed to '3'

	   In order to avoid the value of these two variables not to be change at the same time 'Clone' method is called
*/
class Magic_clone{
	private $name = "ALI";
	private $data = [];
	public function __construct(){
		echo "Constructor is called<br>";
	}

	// public function get_name(){
	// 	return $this->name;
	// }
	public function __set($variable, $value){
		$this->data[$variable] = $value;
	}

	public function __get($variable){
		if (isset($this->data[$variable])) {
			return $this->data[$variable];
		}
		return "Invalid choice";
	}
	public function __clone(){
		echo "You have just cloned an object";
	}
	
}

$obj = new Magic_clone;
$obj->car = "Honda<br><br>";
echo $obj->car;
$obj1 = clone $obj;
echo $obj1->car  = "Toyota";
echo "<br>".$obj1->car;
echo "<br>".$obj->car;



?>