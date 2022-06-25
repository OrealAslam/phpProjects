<?php 
class Person{
	private $name = 'Ali';
	private $data = [];
	public function __construct(){
		echo "Message from person.php<br><br>";
	} 
	public function __set($variable, $value){
		echo "<br><br>set method is called::named : $variable<br>Value is : $value";
		$this->data[$variable] = $value;
		if (array_key_exists($variable, $this->data)) {
			return $this->data[$variable];
		}
		else{
			return "Invalid key...";
		}
	}

	public function __get($get_name){
		echo "get method is called::  named :  $get_name<br>";
		$this->data[$variable] = $get_name;
		if (array_key_exists($variable, $this->data)) {
			return $this->data[$variable];
		}
		else{
			return "Invalid key...";
		}
	}
}

$obj = new Person();
$obj->setter = "My name";

?>