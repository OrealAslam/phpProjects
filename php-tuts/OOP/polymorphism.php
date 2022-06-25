<?php 
interface Animal_interface{
	public function talk();
}

class Dog implements Animal_interface{
	public function talk(){
		echo "Dog says woof woof woof!!!<br>";
	}
}

class Cat implements Animal_interface{
	public function talk(){
		echo "Cat says Meow Meow Meow!!!<br>";
	}
}

class Lion implements Animal_interface{
	public function talk(){
		echo "Lion says Roarrrrrr!!!<br>";
	}
}

class Animal{
	public function talk($obj){
		$obj->talk($obj);
	}
}

$obj = new Animal;
$Cat = new Cat;
$obj->talk($Cat);

$Dog = new Dog;
$obj->talk($Dog);

$Lion = new Lion;
$obj->talk($Lion);
?>