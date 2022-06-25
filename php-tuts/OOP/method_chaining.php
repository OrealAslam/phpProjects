<?php 
class Method_Chain{
	private static $name;
	private static $age;
	public function __construct(){
		echo "Constructor is just called<br>";
	}
	public function set_name($get){
		self::$name = $get;
		return $this;
	}
	public function set_age($age){
		self::$age = $age;
		return $this;
	}
	public static function get_name(){
		return self::$name."<br>";
		return $this;
	}
	public static function get_age(){
		return self::$age;
		return $this;
	}
	public function __destruct(){
		echo "<br>Destructor is just called";
	}
}

$obj = new Method_Chain;
$obj->set_name("Oreal Aslam")->set_age("21");
echo $obj->get_name();
echo $obj->get_age();

?>