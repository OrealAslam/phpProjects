<?php 
class Fruit{
	protected $name;
	protected $color;
	protected $taste;
	protected $weight;

	protected function __construct(){
		$this->name = "";
		$this->color = "";
		$this->taste = "";
		$this->weight = 0;
	}
	protected function set_info($name, $color, $taste, $weight){
		$this->name = $name;
		$this->color = $color;
		$this->taste = $taste;
		$this->weight = $weight;
	}
	protected function get_info(){
		echo "Fruite name is :".   $this->name."<br>";
		echo "Fruite color is :".  $this->color."<br>";
		echo "Fruite taste is :".  $this->taste."<br>";
		echo "Fruite weight is :". $this->weight."<br>";
	}
	protected function __destruct(){}
	
}
class Mango extends Fruit{
	public function __construct(){
		parent:: __construct();
	}
	public function setter($name, $color, $taste, $weight){
		$this->set_info($name, $color, $taste, $weight);
	}
	public function getter(){
		echo "<h2>This is Mango class</h2>";
		$this->get_info();
	}
	public function __destruct(){
		parent:: __destruct();
	}
}
class Orange extends Fruit{
	public function __construct(){
		parent:: __construct();
	}
	public function setter($name, $color, $taste, $weight){
		$this->set_info($name, $color, $taste, $weight);
	}
	public function getter(){
		echo "<h2>This is Orange class</h2>";
		$this->get_info();
	}
	public function __destruct(){
		parent:: __destruct();
	}
}


class Vegetables{
	protected $name;
	protected $color;
	protected $weight;
	protected $taste;

	protected function __construct(){
		$this->name = "";
		$this->color = "";
		$this->weight = 0;
		$this->taste = "";
	}
	protected function set_info($name, $color,$taste, $weight){
		$this->name = $name;
		$this->taste = $taste;
		$this->weight = $weight;
		$this->color = $color;
	}
	protected function get_info(){
		echo "Vegetable name :" .$this->name ."<br>";
		echo "Vegetable color : " .$this->color . "<br>";
		echo "Vegetable taste :" .$this->taste. "<br>";
		echo "Vegetable weight :" .$this->weight."<br>";
	}

	protected function __destruct(){}
}

class Potato extends Vegetables{
	public function __construct(){
		parent::__construct();
	}
	public function setter($name, $color, $taste, $weight){
		$this->set_info($name, $color, $taste, $weight);
	}

	public function getter(){
		echo "<h3>This is Potato Class</h3>";
		$this->get_info();
	}
	public function __destruct(){
		parent:: __destruct();
	}
}

$mango = new Mango;
$mango->setter("Chaunsa", "Green", "Sweet", 5);
$mango->getter();

$mango = new Orange;
$mango->setter("Orange", "orange", "Sweet", "5 Dozans");
$mango->getter();
echo "<br>";
$potato = new Potato();
$potato->setter("Potato", "Light_pink", "Sweet", "3Kg");
$potato->getter();
?>