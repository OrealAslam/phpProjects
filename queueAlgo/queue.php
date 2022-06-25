<?php 

// Enqueue opr. in queue

if(isset($_GET['queueValue'])){
	
	$arr = []; $max = 5; $front = -1; $rear  = -1;

	if(is_full($arr, $max) == true){
		echo "Queue Overflow";
	}
	else{

		if ($rear == -1 || $front == -1){
			$front ++;
		}
		$arr[$rear++];
		array_push($arr, $_GET['queueValue']);
	}
	print_r($arr);

}

// check weather the queue is full or not
function is_full($arr, $max){

	if(count($arr) == $max - 1){
		return true;
	}
	else{
		return 0;
	}
}

// function is_empty(){
// 	global $front;
// 	global $rear;

// 	if ($front == -1 && $rear == -1) {
// 		return true;
// 	}
// }



// function enqueue($arr, $value){

// global $front;
// global $rear;
// 	if(is_full() == true){
// 		echo "Queue ~ Overflow";
		
// 	}
// 	else{
// 		if(is_empty() == true){
// 			$front++;
// 		}
// 		array_push($arr, $value);
// 		$rear+=1;
// 	}
// }

// function dequeue($arr){

// 	if(is_empty() == true){
// 		echo "Queue ~ Underflow";
// 		exit();
// 	}
// 	else{
// 		$arr[$front] = "";
// 		$front++;
// 	}
// }




?>