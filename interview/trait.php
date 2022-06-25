<?php 

// Trait in OOP
trait Common{
	public function greet(){
		echo "Hello Everyone";
	}
}

class Base{
	use common;
	public function show(){
		echo "Message from Parent Class";
	}
}

class Derived {
	use Common;

	public function show($msg){
		return $msg;
	}
}

class againDerived {
	use Common;

	public function show(string $msg){
		return $msg;
	}
}




$obj = new Base();	
$obj1 = new derived();	
$obj2 = new againderived();	
// $obj1 = new derived();	

// $obj->greet();

$obj->show();
echo $obj1->show('message from child class');
echo $obj2->show('message from againderived class');


?> 