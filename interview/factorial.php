<!-- <form action="" method="POST">
	<input type="number" name="num" placeholder="enter number">
	<button type="submit" name="find">Find!!</button>
</form> -->
<?php 
// enter number to find factorial of that no.
// 4
// output = 24

// if (isset($_POST['find'])){
	
// 	if (isset($_POST['num'])){
// 		$num = $_POST['num'];
// 		$help = 1;

// 		while ($num >= 1){
// 			$help = $num * $help;
// 			$num--;
// 		}
// 		echo $help;
// 	}
// }


// Bubble Sort

	// $arr = [12,7,31,22,28,15,3];
	// $length = count($arr);

	// echo "Before Sorted";
	// echo "<pre>";
	// print_r($arr);
	// echo "</pre>";

	// for ($i=0; $i<$length; $i++) { 
		
	// 	for ($j=0; $j<count($arr)-1; $j++){ 
			
	// 		if ($arr[$j] > $arr[$j + 1]){

	// 			$temp = $arr[$j + 1];
	// 			$arr[$j + 1] = $arr[$j];
	// 			$arr[$j] = $temp;
	// 		}

	// 	}
	// }

	// echo "After Sorted";
	// echo "<pre>";
	// print_r($arr);
	// echo "</pre>";


// Selection Sort

// $arr = [12,7,31,22,28,1];
// $length = count($arr);

// for ($i=0; $i<$length; $i++){ 
	
// 	for ($j=0; $j<($length)-1; $j++){ 
		
// 		if($arr[$j] > $arr[$length-1]){
// 			$temp = $arr[$j];
// 			$arr[$j] = $arr[$length-1];
// 			$arr[$length-1] = $temp;
// 		}
// 	}
// }
// 	echo "<pre>";
// 	print_r($arr);
// 	echo "</pre>";


// Fabonacci Series

// if (isset($_POST['find'])){
	
// 	if (isset($_POST['num'])){
// 		$num = $_POST['num'];
// 		$help = 0;

// 		while ($num >= 0){
// 			$help = $help + $num;
// 			$num--;
// 		}
// 		echo $help;
// 	}
// }

// Static Variables OOP

	 class base{
		public  static $n = 1;

		function show(){
			
			echo self::$n . "<br>";
			self::$n++;			
		}
	}
	// $obj = new base;
	// class derived extends base{

	// 	public function show(){
			
	// 		return self::$n;
	// 		self::$n++;
	// 	}

	// }
		
	echo base::$n;
	base::$n++;
	echo base::$n;
	echo "<br>";
	die();
	// $obj = new Base();
	
	// $obj->show() . "<br>";
	// $obj->show() . "<br>";
	// base::show() . "<br>";
	// base::show() . "<br>";
	// base::show() . "<br>";

	// $obj1 = new derived();
	// echo "Called from derived class : " . $obj1->show();
	

?>