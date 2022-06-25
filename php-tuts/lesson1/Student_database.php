<?php 

$host = "localhost";
$user = "root";
$password = "";
$db_name = "login";

$connection = mysqli_connect($host, $user, $password, $db_name);


if(!$connection){
	echo "Unable to connect";
	exit();
}		

else{
	echo "connected!!... <br>successfully" ."<br>";
}	

// Now SELECT data from Database: login » Table: student_info

// selectiong everything from table
$table_student_info = "SELECT `First_Name` FROM `student_info`";

// Execute the query
// first declare a variable to understand code easily
$execute = mysqli_query($connection, $table_student_info);	//we can write it as$execute = mysqli_query($connection, SELECT * FROM `student_info`);

// A function that return no. of rows(records) found in table	mysqli_num_rows($execute);

$rows = mysqli_num_rows($execute);
echo $rows . "rows found in DB_TABLE". "<br>"."<br>"; 

//Fetching data form table using some pre-defined MySQLi functions

/*
it will display next record every time it is call, it will return associated array
mysqli_fetch_assoc($execute);

it will display next record every time it is call, it will return hybrid array (indexed, associated)
mysqli_fetch_array($execute);
*/

$display_record = mysqli_fetch_assoc($execute);
echo "<pre>";
print_r($display_record);
echo "</pre>";

$display_record = mysqli_fetch_assoc($execute);
echo "<pre>";
print_r($display_record);
echo "</pre>";


$display_record = mysqli_fetch_assoc($execute);
echo "<pre>";
print_r($display_record);
echo "</pre>";

?>