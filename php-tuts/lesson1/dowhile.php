<?php 

/*
Syntax of do while loop :
--------------------------
do{
	staement(n)s;
	increment / decrement;

}while(ocndition)

//Drawbavck of do while is that the loop is executed atlest one time,
 because conditionis checked at the end. 

*/

$i =0;

 $arr = array(12,24,34,43,54,6545,756,765,856,865,7743,63,5,21,415,365,465,12,124,3242,324,234,23,432,432,4);
 do{


 		echo  $arr[$i] ."<br>";
 		$i++;


 }while($i<count($arr))
?>