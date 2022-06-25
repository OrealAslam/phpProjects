<?php 
interface Parent_functions{
	public function calc_circle_area($radious);
	public function calc_rect_area($length, $width);
}
class calculation implements Parent_functions{
	private $radious;
	private $length;
	private $height;
	public  $pi = 3.1415;

	public function calc_circle_area($radious){
		$this->radious = $radious;
		$circle_area = $this->pi * $this->radious * $this->radious;
		echo "Area of circle is : ".$circle_area. " <br> ";
	}
	public function calc_rect_area($length, $height){
		$this->length = $length;
		$this->height = $height;
		$area_of_rectangle = $this->length * $this->height;
		echo "Area of rectangle is :" . $area_of_rectangle;
	}
}
$obj = new calculation;
$obj->calc_circle_area(2);
$obj->calc_rect_area(2,7);
?>