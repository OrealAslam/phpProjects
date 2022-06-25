<?php 
class Car_class{
	protected $name;
	protected $company;
	protected $color;
	protected $weight;
	protected $seater;
	protected $transmission;

	function __construct(){
		echo "You created a car object"."<br><br>";
	}

	function set_name($car_name){
		$this->name = $car_name;

	}

	function set_company($company){
		$this->company = $company;
	}

	function set_color($car_color){
		$this->color =$car_color; 
	}

	function set_weight($car_weight){
		$this->weight = $car_weight;
	}

	function set_seater($car_seater){
		$this->seater = $car_seater;

	}

	function set_transmission($car_transmission){
		$this->transmission = $car_transmission;
	}

	function get_name(){
		return $this->name;
	}

	function get_company(){
		return $this->company;
	}

	function get_color(){
		return $this->color;
	}

	function get_weight(){
		return $this->weight;
	}

	function get_seater(){
		return $this->seater;
	}

	function get_transmission(){
		return $this->transmission;
	}
}

$car = new Car_class;

$car->set_name('Mehran VXR');
$car->set_color('Beige');
$car->set_transmission('Manual');
$car->set_weight('1200Kg');
$car->set_seater('4');
$car->set_company('SUZUKI');

echo $car->get_name(). "<br>";
echo $car->get_company() . "<br>";
echo $car->get_color() . "<br>";
echo $car->get_weight() ."<br>";
echo $car->get_seater() . "<br>";
echo $car->get_transmission(). "<br>";


?>