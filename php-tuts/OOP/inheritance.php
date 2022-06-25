<?php 
class Mammal{
	protected $skin_color;
	protected $age;
	protected $weight;
	protected function __construct(){
		$this->skin_color = "";
		$this->age = 0;
		$this->weight = 0;
	}
	protected function set_color($color){
		$this->skin_color = $color;
	}
	protected function set_age($age){
		$this->age = $age;
	}
	protected function set_weight($weight){
		$this->weight = $weight;
	}

	protected function get_color(){
		return $this->skin_color;
	}
	protected function get_age(){
		return $this->age;
	}
	protected function get_weight(){
		return $this->weight;
	}
	protected function __destruct(){}
}

class Cat extends Mammal{
	public $name;
	public function __construct(){
		parent:: __construct();
	}
	public function set_data($skin_color, $name, $age, $weight){
		$this->skin_color = $skin_color;
		$this->name = $name;
		$this->age = $age;
		$this->weight = $weight;
	}
	public function show(){
		echo "Skin color is: ".$this->skin_color."<br>";
		echo "Name is: ".$this->name."<br>";
		echo "Age is: ".$this->age."<br>";
		echo "Weight is: ".$this->weight."<br>";
	}
	public function __destruct(){
		parent:: __destruct();
	}
}
$obj_cat = new Cat();
echo "<h1>This is Cat class object</h1>";
$obj_cat->set_data("Grayblack", "Arvin", "3 y/o", "2.5Kg");
$obj_cat->show();
echo "<br><br>";
echo "<h1>Here is Dog class object</h1>";
class Dog extends Mammal{
	public $breed;
	public $name;

	public function set_data($skin_color, $name, $age, $weight, $breed){
		$this->skin_color = $skin_color;
		$this->name = $name;
		$this->age = $age;
		$this->weight = $weight;
		$this->breed = $breed;
	}
	public function __construct(){
		parent::__construct();
	}
	public function set_info($breed, $skin_color, $name, $age, $weight){
		$this->breed = $breed;
		$this->skin_color = $skin_color;
		$this->name = $name;
		$this->age = $age;
		$this->weight = $weight;
		$this->breed = $breed;
	}
	public function show(){
		echo "Breed is: ".$this->breed."<br>";
		echo "Skin color is: ".$this->skin_color."<br>";
		echo "Name is: ".$this->name."<br>";
		echo "Age is: ".$this->age."<br>";
		echo "Weight is: ".$this->weight."<br>";
	}
	public function __destruct(){
		parent::__destruct();
	}
}
$obj_dog = new Dog();
$obj_dog->set_info("Labora", "Brown", "Tommy", "2 y/o", "6Kg");
$obj_dog->show();
?>