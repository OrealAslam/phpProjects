<?php 
class Person{
	public $name;
	public $age;
/*In this function we set the default value of Name as None 
function get_name($person_name = "None"){
		$this->name = $person_name;
		return $person_name;
	}	
*/
	public function get_name($person_name = "None"){
		$this->name = $person_name;
		return $person_name;
	}
	function __construct(){
		echo "<br>Constructor is called : <br>";
	}
/*In this function we set the default value of Age as 0
function get_age($person_age = "0"){
		$this->age = $person_age;
		return $person_age;

	}
*/	

	public function get_age($person_age = "0"){
		$this->age = $person_age;
		return $person_age;

	}
}

$p1 = new Person;
$p1->get_name("Basharat");
$p1->get_age(51);
echo $p1->name;
echo "<br>". $p1->age;

$p2 = new Person();
$p2->get_name();
$p2->get_age();
echo $p2->name."<br>";
echo $p2->age."<br>";


?>