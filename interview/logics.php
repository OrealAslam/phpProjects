<form method="POST" action="">
	<input type="text" name="string" placeholder="Enter a anumber">
	<button type="submit" name="find">Solution</button>
</form>
<?php 

	// $x = 12;
	// $y = 13;
	// $z = 0;
	// $a;
	// $a = $z;
	// $z = $x;
	// $x = $a;
	// echo $a;
	// echo $x;
	// echo $y;

function count_length($str){
	$count = 0;
	while (isset($str[$count])){
		$count++;
	}
	return $count;
}

if (isset($_POST['find'])){

echo "Length of string is : ".count_length($_POST['string']);

}


?>