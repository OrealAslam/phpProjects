<?php 
/*Syntax of Constant:
						define(constant_name,constant_value,case_insensitive(true,false))
*/
define ("CNIC", 3520205947935, true);
print(gettype(CNIC))."<br>";
echo cnic."<br>";						


define("PI", 3.1415)."<br>";
print(PI)."<br>";
echo "This is your CNIC number :";
print(CNIC);

?>