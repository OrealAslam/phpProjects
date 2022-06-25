<?php 
/*Magic Methods in PHP (OOP)
Note:- Whenever you write a method name in class doesn't use '__'(__abc) for the method name bcz PHP also define __methods which are called magic methods.

__construct()
		This finction is called automatically when the class object is created
__destruct()
		This is also called automatically(programmer doesn't need to call it manually
		Before it is called the memory used by class object is de-allocated and after that __destruct() function is called)
__set($variable, $value)
		This function is called automatically when you write (assign a value to a private property or non-existing property) a non-existing or private property
__get($name)
		This function is called automatically when you tried to read (echo-out a property value) a non-existing property or private property
__clone()
__autoload()
__tostring()
__call()
*/
class abc{
	private $name;
	private $data = [];
	public function __set($variable, $value){
		//echo "Write(assign a value to property) a non-existing property or private property: <br>";
		echo "Variable name is : ".$variable."<br>Value is : ".$value;
		$this->data[$variable] = $value;
	}

	public function __get($variable){
		if (isset($this->data[$variable])) {
			return $this->data[$variable];
		}
		else{
			return "Invalid property";
		}
	}
	
}

$obj = new abc();
$obj->country = 'United Kingdom'.'<br>';
echo $obj->country."<br>";

?>