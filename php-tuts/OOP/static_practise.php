<?php 
// Example of : how many times the constructor is called

// class Static_Example{
// 	private static $obj_created = 0;
// 	public function __construct(){
// 		self::$obj_created ++;
// 	}
// 	public static function display_count(){
// 		return self::$obj_created;
// 	}
// 	public function __destruct(){
// 		self::$obj_created --;
// 	}
// } 
// $obj = new Static_Example;
// $obj1 = new Static_Example;
// $obj3 = new Static_Example;
// $obj4 = new Static_Example;
// $obj5 = new Static_Example;
// $obj6 = new Static_Example;
// $obj7= new Static_Example;
// $obj8 = new Static_Example;
// $obj9= new Static_Example;
// $obj10 = new Static_Example;
// $obj11= new Static_Example;
// $obj12 = new Static_Example;
// echo Static_Example::display_count();

class One_class{
	public function __construct(){

	}
	public function abc($start, $end){
		for ($i=$start; $i<=$end; $i++){ 
			$array = array($i);
			print_r($array);
			
		}
	}
	public function __destruct(){

	}
}
$obj = new One_class();
$obj->abc("A", "L");
?>