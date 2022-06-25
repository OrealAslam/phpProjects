<?php 
class Mammal{
	private $category;
	private $family;

	final public function do_something(){
		echo "This is final method";
	}
}
class Dog extends Mammal{
	public function do_something(){
		echo __FUNCTION__. ": is overidden IN CHILD CLASS";
	}
}
$obj = new Dog();
$obj->do_something();
?>