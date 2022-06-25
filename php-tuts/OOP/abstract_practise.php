<?php 
abstract class Vegetables{
	protected $name;
	protected $color;
	protected $taste;
	protected $season;

	abstract protected function set_detail($name, $color, $taste, $season);
	abstract protected function show_info();

}
class Tomato extends Vegetables{
	public function set_detail($name, $color, $taste, $season){
		$this->name = $name;
		$this->color = $color;
		$this->taste = $taste;
		$this->season = $season;
	}

	public function show_info(){
		echo "Name :" .$this->name ."<br>".
			 "Color :" .$this->color ."<br>".
			 "Taste :" .$this->taste . "<br>".
			 "Season :" . $this->season . "<br>";
	}
}
$Tomato = new Tomato;
$Tomato->set_detail('Tomato', 'Red', 'Sweet', '4-season');
$Tomato->show_info();
?>