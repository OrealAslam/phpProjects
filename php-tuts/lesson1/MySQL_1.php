<?php 

/*

We have two types of libraries, those comes-up with Php-5 installation

msql (depricated in php version >= 5.0.x )

PDO
mysqli

The physical database is MySQL

*/

/*
	Creating A connection:
		msqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME, PORT, SOCKET );

	Important:
				mysqli_connect_error(db_name);

		This function is used to debug a problem when database create a problem during connection period		
*/

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "my_first_db");



// Creating a DB connection
$db_connection = mysqli_connect("DB_HOST", "DB_USER","DB_PASSWORD","DB_NAME");

	if(isset($db_connection)){
		echo "Connection Established";
	
	}
	else{
		echo "Connection Failed...!!";
	}

	/*
		Create a Table:
		 my_first_db(rollno, name, semester, email, batch );
	*/

		 //selescting everything from my_first _database table


//$sql = "SELECT * FROM `my_first_database`";

// Executing query
//$result = mysqli_query($db_connection, $sql);

// mysqli_num_rows($result);   return number of rows found in selscted table
    //  $rows= mysqli_num_rows($result);

//echo $rows;
?>








