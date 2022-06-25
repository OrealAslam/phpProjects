<?php 
class Employee{
	public $name;
	public $age;
	public $salary;

	public function __construct(){
		$this->name = "";
		$this->age = 0;
		$this->salary = 0;
	}
	public function set_info($n, $a, $s){
		$this->name = $n;
		$this->age = $a;
		$this->salary = $s;
	}
	public function get_info(){
		echo __CLASS__."  name is:  " .$this->name . "<br>" ;
		echo __CLASS__."  age is: " .$this->age . "<br>" ;
		echo __CLASS__."  salary is: " .$this->salary . "<br>" ;
	}
	public function __destruct(){}
}
class Manager extends Employee{
	public $ta = 10000;
	public $pb = 500;
	public $total_salary; 
	public function __construct(){
		parent::__construct();
	}
	public function manager_info(){
		echo "Manager name is: ". $this->name . "<br>";
		echo "Manager age is: ". $this->age . "<br>";
		echo "Manager salary is: ". $this->salary += $this->ta + $this->pb;
	}
	public function __destruct(){}
}




$e = new Employee;
echo "<h3>Employee Profile</h3>";
$e->set_info("Muneeb Dk", 22, "21000");
$e->get_info();

echo "<h3>Manager Profile</h3>";
$manager = new Manager();
$manager->set_info("Oreal Aslam", 21, "37000");
$manager->manager_info();

?>