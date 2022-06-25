<?php 
/*
__call() method is called automatically when you tried to call a private or non-existing function/method
*/
class Call_method{
	private $fname;
	private $lname;

	private function get_name($first_name, $last_name){
		echo $this->fname = $first_name;
	    echo $this->lname = $last_name;
	}

	public function __call($method, $args){
		if (method_exists($this, $method)){
			call_user_func_array([$this ,$method], $args);

		}
		else{
			echo "Method not exists : $method";
		}
	} 
}
$obj = new Call_method;
$obj->get_name("Yahoo", 'Baba');
?>