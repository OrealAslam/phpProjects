<?php 
abstract class Mammal{
	protected $name;
	protected $age;

	abstract protected function set_name($name);
	abstract protected function set_age($age);

	public function show(){
		return $this->name . " <br> " . $this->age;
	}
}

class Dog extends Mammal{

	public function set_name($name){
		$this->name = $name;
	}

	public function set_age($age){
		$this->age = $age;
	}
}


$obj = new Dog();
$obj->set_name("American Pittbull");
$obj->set_age(2);

echo $obj->show();
?>