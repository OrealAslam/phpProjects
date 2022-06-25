<?php 
class Student_info{
	public $name;
	public $age;
	public $gender;
	function __construct($n = "No name", $a = "Age is 0", $g = "No gender"){
		/*here $n,$a,$g are local variables (local scope variables) bcz they are accessible only in the construct function.
		Whereas $name, $age &$gender are global scop vaiables bcz they are accessiblle anywhere inthe class
		*/
		echo "Your name is : ".$this->name = $n;
		echo "<br>Your age is : ".$this->age = $a;
		echo "<br>Your gender is : ".$this->gender = $g;
	}

	function get_name($stu_name){
		$this->name = $stu_name;
		return $stu_name;
	}
	function get_age($stu_age){
		$this->age = $stu_age;
		return $stu_age;
	}
	function get_gender($stu_gender){
		$this->gender = $stu_gender;
		return $stu_gender;
	}
}
$stu1 = new Student_info("Muneeb Ahmed", 22, "Male");
//echo $stu1->get_name()."<br>";
//echo $stu1->get_age()."<br>";
//echo $stu1->get_gender()."<br>";

?>