<?php 

// Program to implement stack operation

class Stack{
	public $item = [];
	public $size = 5;
	public $point = 0;

	// Adding items into the stack
	
	public function push($data){

		if ($this->point >= $this->size){

			echo "Stack Overflow";
		}
		else{

			$this->item[$this->point] = $data;
			$this->point++;
		}
	}

	// Deleting items from top of the stack

	public function pop(){

		if (empty($this->item)){
			echo "Stack Underflow";
		}		
		else{
			array_pop($this->item);
		}
	}
}


$stack = new stack;


$stack->push(12);
$stack->push(23);
$stack->push(42);
$stack->push(25);
$stack->push(121);

$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();
$stack->pop();

echo "<br>" . "<pre>";
print_r($stack->item);

?>