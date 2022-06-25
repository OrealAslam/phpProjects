<?php 

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "login");


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
		echo "Unable to connect with database";
		exit();
	}

	// generate a query
	$query = "SELECT * FROM `student_info`";
	//prepare a statement
	$stmt = mysqli_prepare($connection, $query);
	if($stmt){
		//mysqli_stmt_bind_param($stmt, 'i', $id);
		
		/*yaha pr hum result bind kr rhy ha jb k phely hhum parameters bind krty thy 
		result ess liye bind kr rhy ha q k hum database sy pora record display krwa rhy ha 
		jb k pehly hum sirf one specific record ko DELETE, UPDATE ya INSERT krwa rhy hoty thy */
		mysqli_stmt_bind_result($stmt, $ID, $First_Name, $Last_Name, $E_mail);
		mysqli_stmt_execute($stmt);

		while(mysqli_stmt_fetch($stmt)){
		echo $ID."<br>".$First_Name."<br>".$Last_Name."<br>". $E_mail."<br>"."<br>"."<br>";
	}

	}
	else{
		echo "Unable to prepare a statement";
	}

?>