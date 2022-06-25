<?php
/*
We cannot access any private property by using object (it cause Fatel error) i.e we cannot retrieve any date from private property using a class object.

				Access Specifiers
						Class 			Derived_Class		Outside(object)

			Public 		yes 				yes 				yes

			Protected 	yes 				yes 				no

			Private 	yes					no 					no
				

*/ 
class Truck{
	public $name;
	public $engine;

	public function __construct($name = 'SUZUKI', $engine = '800cc'){
		$this->name = $name."<br>";
		$this->engine = $engine."<br>";
				
	}

	public	function get_name($n){
		$this->name = $n;
	}

	public function show_name(){
		return $this->name .'<br>'. $this->engine;
	}

	public function get_engine($e){
		$this->engine = $e;
	}
	/*public function show_engine(){
		return $this->engine;
	}*/
	public function __destruct(){
		echo "<br>Destructor is called<br>";
	}

}
/*Object Creation*/

$obj1 = new Truck("Dihatsu Coure", '845cc');
$obj1->get_name("Honda");
$obj1->get_engine('1000cc	');
echo $obj1->show_name()."<br>";
//echo $obj1->show_engine()."<br>";
$car2 = new Truck("HUNDYI Shahzore", '2200cc');
$car2->get_name('Santro');
$car2->get_engine('850cc');
echo '<br>'.$car2->show_name();



/*$obj1->get_name('ISUZU');
echo $obj1->show_name()."<br>"	;
echo $obj1->get_engine('3000cc')."<br>"; 
*/
?>