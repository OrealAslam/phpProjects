<!DOCTYPE html>
<html>
<head>
	<title>Fetch DB Data</title>
	<style type="text/css">
		table, th, tr, td{border: 1px solid red; border-spacing: 0px; text-align: justify-all;}
		#error{color: red;}
		#success{color: green;}
		#success, #error{text-transform: uppercase; font-family: sans-serif; font-size: 24px;}

	</style>
</head>
<body>
	<h2>Insert data into DB</h2>
	<P>Here we do an example of selecting and inserting  data in our DB .</P>
	<form method="POST" action="table_info.php">
		<input type="text" name="username" placeholder="username" required>
		<input type="password" name="password" placeholder="password" required>
		<input type="email" name="email" placeholder="email" required>
		<input type="submit" name="btn" value="Insert">
		<br><br>
		
		
	</form>
	
	<table>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		
		

		<?php 
			$connection = mysqli_connect("localhost","root","","login");
			if (mysqli_connect_errno()) {
			 	die(mysqli_connect_error());
			 } 
			 $sql = "SELECT * FROM `form_upload`";
			 $result = mysqli_query($connection, $sql);
			 if (mysqli_num_rows($result) > 0) {
			 	while ( $data = mysqli_fetch_assoc( $result )) {
			 		echo "<tr>";
			 		echo "<td>".$data['username'] ."</td>>";
			 		echo "<td>".$data['password'] ."</td>>";
			 		echo "<td>".$data['email']    . "</td>>";		 		
			 		echo "</tr>";
			 	}
			 }
		?>
	</table><br><br>

	<div id="success">
		<?php
			 $connection = mysqli_connect("localhost","root","","login");
				if (mysqli_connect_errno()) {
				 	die(mysqli_connect_error());
				 } 
				if (isset($_GET['success'])) {
				 	echo $_GET['success'];
				 } 
		?>
	</div>

	<div id="error">
		<?php
			 $connection = mysqli_connect("localhost","root","","login");
				if (mysqli_connect_errno()) {
				 	die(mysqli_connect_error());
				 } 
				if (isset($_GET['error'])) {
				 	echo $_GET['error'];
				 } 
		?>
	</div>

	<h2>Select specific data from DB</h2>
	<P>Now we do an example of selecting specific data on 'ID'(or something else) base.</P>

	<form action="tables.php" method="POST">
		<input type="text" name="username" placeholder="enter username" required autofocus>
		<input type="submit" name="button" value="select / view record" required autofocus>
	</form><br>
	<table>
		<th>User Name</th>
		<th>Password</th>
		<th>Email</th>
		<th>Gender</th>
		<th>Agreement</th>
		<?php 
			if (isset($_POST['button'])) {
				$name = $_POST['username'];
				$connection = mysqli_connect("localhost","root","","login");

				if (mysqli_connect_errno()) {
				 	die(mysqli_connect_error());
				 } 
				 $sql = "SELECT * FROM `form_upload` WHERE `username`= '".$name."'";
				$query = mysqli_query($connection, $sql);
				// Now search krny k liye haneesha while loop use krty ha 
				while ( $pass = mysqli_fetch_array( $query )) {
			 		echo "<tr>";
			 		echo "<td>".$pass['username'] ."</td>>";
			 		echo "<td>".$pass['password'] ."</td>>";
			 		echo "<td>".$pass['email']    ."</td>>";
			 		echo "<td>".$pass['gender']   . "</td>>";
			 		echo "<td>".$pass['agreement'] . "</td>>";
			 		
			 		echo "</tr>";
			 	}
			}
		?>
	</table>



	<h2>Delete Specific record from table</h2>
	<p>Now we do an example of deleting a specific record from data base</p>

	<form method="POST" action="tables.php">
		<input type="text" name="email" placeholder="email" autofocus>
		<input type="submit" name="delete" value="Delete '1' Record">
	</form>
	
	<?php 
		if (isset($_POST['delete'])) {
			$email = $_POST['email'];

			$connection = mysqli_connect("localhost","root","","login");

				if (mysqli_connect_errno()) {
				 	die(mysqli_connect_error());
				 } 

			 $sql = "DELETE * FROM `form_upload` WHERE `email`= '".$email."' ";
			 $query = mysqli_query($connection, $sql);
			 if ($query) {
			 	$affected = mysqli_rows_affected($query);
			 	if ($affected) {
			 		echo "Data deleted successfully!!";
			 	}
			 	else{
			 		echo "Error while deleting data";
			 	}
			 }

		}
	?>
	
</body>
</html>