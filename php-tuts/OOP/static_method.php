<?php 
class Some_class{
	private static $object_created = 0;
	public function __construct(){
		self::$object_created++;
	} 
	public static function object_counts(){
		return self::$object_created;
	}
	public function __destruct(){
		self::$object_created--;
	} 
}
$obj = new Some_class;
$obj1 = new Some_class;
$obj2 = new Some_class;
$obj3 = new Some_class;
$obj4 = new Some_class;
echo Some_class::object_counts();
?>