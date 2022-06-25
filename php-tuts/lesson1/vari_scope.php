<?php 
/*
	Three types of variable scope in php

	Global Scope.
	Local Scope.
	Static Scope.

*/

/*$x  =35;

function abc(){
// we can set the scope of $x global.
	// but is not a good approach to set the sopce of variable global, because it can overlap/modify the varable.
	global $x;
	echo $x;
}

abc(); */
// This is static scope.

/*function third(){
	static $y=1;
	echo $y++ ."<br>";
}

third();
third();
third();
third();
third();
third();
*/
// local scope.

//$xyz = 12;

// Local Scope.
/*
function abc(){
	$xyz=12;
	echo $xyz . "<br>";
	}

abc();
abc();
abc();
abc();
abc();
abc();
abc();
abc();
abc();
abc();
abc();
abc();
*/

// Static Scope:
				   //In static scope variable jo function k under declare hota ha wo function ki execution k baad bhi qaim rehta ha mtlb agr $x ki value function k under 10 ha tw function ki execution k baad jb exe. function k bahir nikly gi tw bhi $x ki value 10 hi hry gi.
				   


?>