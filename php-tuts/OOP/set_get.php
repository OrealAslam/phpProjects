<?php 
class Getter_Setter{
	public $name;
	private $data = [];
	public function __construct(){
		//echo "Object created<br>";
	}

	public function __set($variable, $value){
		 $this->data[$variable] = $value;
	}

	public function __get($variable){
		if (isset($this->data[$variable])) {
		 	return $this->data[$variable];
		 }
		 	return "Invalid property";
	}

	public function __destruct(){
		//echo "<br>Object destroyed";
	}
}

$obj = new Getter_Setter();
echo $obj->country = "Pakistan<br>";
echo $obj->city = "Lahore";
?>