<?php 
class A{
	public $name = "Oreal Aslam";
	private $data = [];


	public function __set($variable, $value){
		$this->data[$variable] = $value;
	}

	public function __get($variable){
		if (isset($this->data[$variable])){
			return $this->data[$variable];
		}
		return "Property not exists";
	}

	public function __clone(){
		echo "You have just cloned an object";
	}

	public function __call($function, $args){
		if ($function == 'do_something'){
			// echo "Function name is :". $function."<br>And sum of the arguments of the function is:<br>";	
			foreach ($args as $value){
				if ($value == NULL){
					echo "Function with 0 arguments";
				}
			}
			echo "Sum of function arguments is : <b>".array_sum($args) ."</b>";
		}
		else{
			echo "undefined function is called";
		}
	}	
}

$obj = new A;
$obj->do_something();
// $obj1 = clone $obj;

// $obj1->lname = "Osama";
// $obj->lname = "Oreal";
// $obj->email = "orealaslam@gmail.com";
// $obj->password = "123456";
// $obj1->password = "12345678910";


// echo $obj->lname."<br>";
// echo $obj->email."<br>";
// echo $obj1->password."<br>";




?>