<?php 
/*
Parameterized query and prepaid statement
They are very useful to make our web-based application more secure
to prevent from sql-injection

-------------------------------------------------------------------

First db_query is prepared.
Then it is parsed.
After that it is executed
*/

$connect  = mysqli_connect("localhost", "root", "", "login");
// check the connection with db
if(!$connect){
	echo "Unable to connect with db";
	exit();
}

/*$select = "SELECT* FROM `student_info`";
$query = mysqli_query($connect, $select); 
if($query){
	echo "Display successfully!!..";
}
	else{
			echo "Unable to update the data";
}


while($query){
	$display = mysqli_fetch_assoc($query);
	echo "<pre>";
	print_r($display);
	echo "</pre>";
}
*/
//	Some important mysql functions
// close the db as you use it
// Make ur habit to close it after use
// This is good practise for security purpose
$query = "SELECT*  FROM `student_info`";
// Here we prepare the sql_statement
$statement = mysqli_prepare($connect, $query);
// Now if statement is prepared further operations is performed
if($statement){
	// Bind the the whole result
	//mysqli_stmt_bind_param($statement, "isss", $ID, $First_Name, $Last_Name, $E_mail);

	//Note jab hum pura table show krna ho tw parameters bind krny ki zaroorat nai ha mujy sirf result bind krna ho ga 

	//Binding result
	mysqli_stmt_bind_result($statement, $ID, $First_Name, $Last_Name, $E_mail );

	// Now execute the statement
	mysqli_stmt_execute($statement);

	// Here we fetch data from db
	while(mysqli_stmt_fetch($statement)){
		echo $ID ."<br>". $First_Name ."<br>". $Last_Name ."<br>". $E_mail ."<br><br>" ;
	}
		
		mysqli_stmt_close($statement);
	
}
else{
	echo "Unable to execute your query";
}
mysqli_close($connect);

?>