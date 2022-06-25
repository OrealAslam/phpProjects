<?php 
session_start();

if (!isset($_SESSION['USEREMAIL'])) {
  echo "<script>window.location.href= 'http://localhost/FYProject/user/login.php';</script>";
}
else{

	// Register a Group
	if (isset($_POST['groupName']) AND isset($_POST['groupDesc'])){

		 include '../config.php';

	    $group_name = mysqli_real_escape_string($conn, $_POST['groupName']);
	    $group_desc = mysqli_real_escape_string($conn, $_POST['groupDesc']);
	    $group_profile = 'GroupPhoto/default.jpg';

	    $sql = "INSERT INTO groups (g_name, g_desc, g_profile, admin_id) VALUES (?,?,?,?)";
	    $stmt = $conn->prepare($sql);
	    if ($stmt){
	    	$stmt->bind_param('sssi', $group_name, $group_desc, $group_profile, $_SESSION['UID']);
	    	if ($stmt->execute()){
	    		echo '<span class="text-primary">Group created Successfully</span>';
	    	}
	    	else{
	    		echo "Ohh!! Group already exists. Use different name";
	    	}
	    }
	    else{
	    	echo "Unable to work on your query. Try again Later";
	    }
	}
}

?>