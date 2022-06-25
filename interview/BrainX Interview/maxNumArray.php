<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input type="number" name="num" value="enter number to find">
	<button type="submit" name="btn">Find total Occurances</button>
</form>

<?php 

$arr =[123,12,12,12,23,34,34,5456,1];

$length = count($arr);

$max = 0;

for ($i=0; $i < $length; $i++) { 
	
	for ($j=0; $j < $length - 1; $j++) { 
		
		if($arr[$j] > $arr[$j + 1]){

			$temp = $arr[$j];
			$arr[$j] = $arr[$j + 1];
			$arr[$j + 1] = $temp;

		}
	}
}

echo "<pre>";
print_r($arr); // printing a sorted array

// CHECK NO. OF OCCURANCES OF A NUMBER IN AN ARRAY
if(isset($_GET['btn']) and isset($_GET['num'])){
	$num = $_GET['num'];
	$found = 0;

	foreach ($arr as $key => $value){
		
		if($num == $arr[$key]){
			$found++;
		}
	}

	echo "<b>".$num . "</b>found in the given array <b> ".$found."</b>times <br>";
}


// ---------------------------------------------------------------------------------

// CHECK THE BIGGEST NUMBER IN A GIVEN ARRAY

foreach ($arr as $key => $value){
	
	if($arr[$key] > $max){
		$max = $arr[$key];
	}
}

echo "Maximum number in a given array is :". $max."<br><br>";





?>