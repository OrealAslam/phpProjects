<?php 
/*class Car_class{
	private $car_name;
	private $car_color;
	private $car_model;

	//Constructor callled here
	function __construct(){
		echo "Constructor is called<br><br>";
	}

	//Getters called here
	function get_name($name){
		$this->car_name = $name;
		return $this->car_name;
	}

	function get_color($color){
		$this->car_color = $color;
		return $this->car_color; 
	}

	function get_model($model){
		$this->car_model = $model;
		return $this->car_model;
	}

}

//Initilize an Object
$toyota = new Car_class();
echo "<br>".$toyota->get_name('Corolla Grande');
echo "<br>".$toyota->get_color('White');
echo "<br>".$toyota->get_model('2019');

*/

class calculation{
	public $a;
	public $b;
	public $c;

	function __construct(){
		echo "Constructor is called : ";
	}
	function addition(){
		$this->c = $this->a + $this->b;
		return $this->c;
	}

	function subtraction(){
		$this->c = $this->a - $this->b;
		return $this->c; 
	}
}

$sum = new calculation();
$sum->a = 10;
$sum->b = 35;

echo $sum->addition() . "<br>";

$sub = new calculation();

$sub->a = 25;
$sub->b = 48;

echo  $sub->subtraction();


?>