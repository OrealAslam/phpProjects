<?php 
/*
Interfaces: 
we cannot use variable in interface.
we only declare method in interface not implement the method.
we cannot create the object of an interface.
Methods use in interface should have public visibility.
unlike abstract class Interface only have CONSTANTS rather than Variables.
 How can we delare interface:

 Syntax of declaring Interface

 Interface Person{
	public function set_fname($fname);
	public function set_lname($lname);
 }

 Note: Inteface ko basically Implement kia jata ha but Class ko extends kiya jata ha
 lkn aik interface 2sry interface ko extends bhi kr skta ha i.e

 class Employee Implements Person, Human(i.e number of interfaces){
	public function set_fname($fname);
	public function set_lname($lname);
	these methods must be implemented in this class otherwise interpreter gives Fatel error 2, abstract method
 }

 Syntax of extending interfaces

 Interface Human extends Person{}

*/
Interface Person{
	public function get_fname($fname);
	public function get_lname($lname);
	public function show();
}
Interface Human{
	public function nature($nature);
	public function mood();
}
class Employee Implements Person, Human{
	private $fname;
	private $lname;
	private $nature;
	private $mood;

	public function __construct(){
		$this->fname = "";
		$this->lname = "";
		$this->nature = "";
		$this->mood = "Happy";
	}
	public function get_fname($fname){
		$this->fname = $fname;
	}
	public function get_lname($lname){
		$this->lname = $lname;
	}
	public function nature($nature){
		$this->nature = $nature;
	}
	public function mood(){
		return $this->mood;
	}
	public function show(){
		echo "First Name is :".$this->fname." <br> " . "Last Name is :" .$this->lname." <br> ". "Nature is :" .$this->nature." <br> ". "Employee Mood :".$this->mood." <br> ";
	}

	public function __destruct(){}
}

$obj = new Employee();
$obj->get_fname('Oreal');
$obj->get_lname('Aslam');
$obj->nature('Kind Nature');
$obj->mood();
$obj->show();
?>