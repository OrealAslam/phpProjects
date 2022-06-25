<?php 


/*
You can use foreachloop only in array;
syntax of foreachloop : 

                      foreach($array_name  AS(keyword) $key(determine index no.) $value(determine index value) ){
								
								BLOCK OF STATEMENT(n)s; 
                      }

*/


$arr = array(12,23,21,42,4,325,34,65,456,213132131,"This one"=> 123,123,21,321,31,32,21,3132,21,312,31,23312,1,31,31,231,3,132,132,1,331,3,31,31,31,31,31,3,131,13,21,4332,4,35,3,545,645,7665,75,76,8,68,76,876,98,969,233,13,13,132,123,132,31,3,345,64,57,56,7658,7,45,3,4,213,432);
foreach ($arr as $key => $value) {
	echo  $key. "=>". $value       ."<br>";
}

?>