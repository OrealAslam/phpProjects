<?php 

/*
1 - rsort($arr)
	This function arrange the array in decending order

	Note:- If we pass randam associative array to rsort function then it will work exactly the same but the indexes values will change to [0][1][2][3] ... so on.

2 - shuffle($arr)
	Simply shuffle the array, along with changing the indexes to [0][1][2] ... so on.

3 - sort($arr)	 
	Sorts an indexed array in ascending order

4 - ksort()	 
	Sorts an associative array in ascending order.

5 - in_array("Oreal", $arr)
	First parameter value to be find second parameter array itself. 

6 - end($arr)
	Returns the last element in an array.

7 - current($arr)
	Returns the very first element in an array.	

8 - asort($arr)
	Sort an associative array in decending order.		
*/


$arr = array('fname' => 'Oreal', 'age' => 23, 'lname' => 'aslam', 'designation' => 'Software Engineer');

echo "Before sorted";
echo "<pre>";
print_r($arr);
echo "</pre>";

// $asd = 14;
// echo $asd;
// echo "<pre>";
// print_r($GLOBALS);



// if(in_array("Oreal", $arr)){
// ksort($arr);
// // echo "After sorted";
// echo "<pre>";
// print_r($arr);
// echo "</pre>";
// }

?>