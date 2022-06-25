<?php 

class Queue{

	public $point = 0;
	public $arr   = [];
	public $size  = 5;

	public function enQueue($data){

		if ($this->point >= $this->size){

			exit("Queue Overflow");
		}
		else{
			$this->arr[$this->point] = $data;
			$this->point ++;
			
		}
	} 

	public function deQueue(){

		if (empty($this->arr)){
			exit("Queue Underflow");
		}
		elsE{
			array_shift($this->arr);
		}
	}
}

$queue = new Queue;

$queue->enQueue(12);
$queue->enQueue(23);
$queue->enQueue(45);
$queue->enQueue(76);
$queue->enQueue(67);


echo "<br>". "<pre>";
print_r($queue->arr);


echo "Start removing element from array at start point";
$queue->deQueue();

echo "<br>". "<pre>";
print_r($queue->arr);

$queue->deQueue();

echo "<br>". "<pre>";
print_r($queue->arr);
$queue->deQueue();

echo "<br>". "<pre>";
print_r($queue->arr);


$queue->deQueue();
$queue->deQueue();

echo "<br>". "<pre>";
print_r($queue->arr);

$queue->deQueue();

?>