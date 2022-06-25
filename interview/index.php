<!-- <form method="POST" action="">
	<input type="number" name="limit" placeholder="enter number" required>
	<button type="submit" name="find">Find!!</button>
</form> -->
<?php 

$arr = [1,2,3,4, 5];
array_unshift($arr, 6);
echo "<pre>";
print_r($arr);
echo "</pre>";

// $count = count($arr);

// for ($i=0; $i <$count; $i++) { 
	
// 	for ($j=0; $j < $count -1; $j++) { 
		
// 		if($arr[$j] > $arr[$j + 1]){
// 			$temp = $arr[$j + 1];
// 			$arr[$j + 1] = $arr[$j];
// 			$arr[$j] = $temp;
// 		}
// 	}
// }

// echo "after sorted";
// echo "<pre>";
// print_r($arr);
// echo "</pre>";

// Fabonacci series

// if (isset($_POST['find'])){
// 	echo"<br>Fibonacci series for value:".$_POST['limit']."<br>";

// 	$n1 = 0;
// 	$n2 = 1;
// 	$x = 0;

// 	for ($i=0; $i <=$_POST['limit']; $i++) { 

// 		echo $n1;
		
// 		$n1 = $n1 + $n2;
// 		$n2 = $x;
// 		$x = $n1;
// 	}
// }


// class Employee{
// 	private $name;

// 	private function set_name($n){
// 		$this->name = $n;
// 	}
// 	public function setter($name){
// 		$this->set_name($name);
// 	}
// 	public function get_name(){
// 		return $this->name;
// 	}
// }

// $obj = new Employee();

// $obj->setter('Assad');
// // $obj->name = 'Oreal';
// echo $obj->get_name()."<br><br>";

// increment / decrement operations detail
// $i=3;
// $j= $i++;
// echo '$i ='.$i . '<br>$j = '. $j;

// $a = 12;

// function abc(&$b){
// 	$b = 10;
// 	return $b."<br>";
// }

// echo "<br><br>". abc($a);

// echo $a."<br><br>";


// list function
// 	//  0,  1,2,3,4, 5
// $arr = [12,14,6,9,15,31,55,12,1];
// // echo "before sorting<pre>";
// // print_r($arr);

// function bubble_sort($arr){
// 	for($i=0; $i<count($arr); $i++){
// 		for ($j=0; $j<count($arr)-1; $j++){ 
// 			if ($arr[$j] > $arr[$j + 1]){
// 				// swapping start
// 				$temp = $arr[$j];  // helping var $temp
// 				$arr[$j] = $arr[$j+1];
// 				$arr[$j+1] = $temp;
// 			}
// 		}
// 	}
// 	return $arr;
// }

// echo "after sorted<pre>";
// print_r(bubble_sort($arr));

// for ($i='a'; $i <='z'; $i++) { 
// 	if($count <= 25 ){
// 		echo "loop : ".  $count; 
// 		echo "&nbsp{<strong>" . $i . "</strong>}<br>";
// 		$arr[$count] = $i;
// 		$count++;
		
// 	}
// 	else{
// 		// display alphabet in desending order
// 		$arrCount = count($arr);
// 		echo "<div style='margin-top:70px';>";
// 		for ($k=$arrCount-1; $k >=0; $k--){ 
// 			echo $arr[$k] . "<br>";	
// 		}
// 		echo "</div>";



// 		exit("Loop Terminated <br><br><strong>So, there are $count alphabets</strong><br><br>");
// 	}
// }


// Program to check weather the string has white spaces or not ??

// $count = 0;
// $arr = [];

// $str = 'Oreal Aslam Chohan';



// 	$n = 0;   // array index or string index
// 	$space = 0; // increment to 1 each time a white space id found.
// 	$spaceArr = [];  // Helping array

// 	while (isset($str[$n])){
// 		// echo $str[$n];

// 		$GLOBALS['spaceArr'][$n] = $str[$n];
// 		$n++;
// 	}


// 	foreach ($spaceArr as $key => $value) {
// 		if ($spaceArr[$key] == ' '){
// 			$space++;
// 		}
// 	}
// 	echo "Total spaces are : ". $space;



// // find string length

// 	$string = 'My name is Oreal Aslam';
// 	echo '<br>'.strlen($string);
?>
