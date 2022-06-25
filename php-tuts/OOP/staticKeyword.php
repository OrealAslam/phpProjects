<?php 
class Static_Methods{
	public static $name;
	public static function set_name($set_name){
		self::$name = $set_name;
		 echo "Class name is => ".__CLASS__."<br>";
		return $set_name;
	}

}

class greeting {
  public static function welcome() {
    echo "Hello World!<br>";
    echo "Class name is => ".__CLASS__."<br>";
  }
}
class SomeOtherClass {
  public function message() {
    greeting::welcome();
  }
}



//$obj = new Static_Methods();
echo Static_Methods::set_name('Oreal Aslam')."<br>";
echo Static_Methods::set_name('Omama Aslam')."<br>";

// Call static method
greeting::welcome();

?>