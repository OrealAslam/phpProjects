<?php 	

class Parrent{
	protected $property = '25Lac';
}
class Child extends Parrent{
	public $info;

	public function __construct(){
		$this->info = $this->property;
	}

	public function show(){
		echo "My inhertied Property is :" . $this->info;
	}
}

$child = new child;
$child->show();
?>