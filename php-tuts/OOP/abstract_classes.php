<?php 
abstract class Mammal{
	protected $name;
	protected $age;
	protected $breed;

	abstract protected function set_name($name);
	abstract protected function set_age($age);
	abstract protected function set_breed($breed);
	abstract protected function show_details();
}
class Dog extends Mammal{
	public function set_name($name){
		$this->name = $name;
	}
	public function set_age($age){
		$this->age = $age;
	}
	public function set_breed($breed){
		$this->breed = $breed;
	}
	public function show_details(){
		echo "Dog name :".$this->name ."<br>".
		"Dog age :" .$this->age . "<br>".
		"Breed :" . $this->breed . "<br>";
	}
}
$dog = new dog;
$dog->set_name('Mogo');
$dog->set_age(2);
$dog->set_breed('Laboura');
$dog->show_details()."<br><br>";
print_r($dog);


?>