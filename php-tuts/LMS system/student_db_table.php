<?php
	$connection = mysqli_connect("localhost", "root","", "lms system");
	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	}
	$sql = "SELECT * FROM `stu_register`";
	$query = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Database Table</title>
	<link rel="stylesheet" type="text/css" href="css//student_database_preview.css">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<div id="container">
		<h3>Students Record</h3>
		<form method="POST" action="find_record.php">
			<input type="text" name="search" placeholder="Quick Search by ID">
			<input type="submit" name="find" value="...">
		</form>
		 <div id="db_data">
			<table class="content-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>fname</th>
						<th>lname</th>
						<th>email</th>
						<th>DOB</th>
						<th>gender</th>
					</tr>
				</thead>
				<tbody>
					<?php

						if (mysqli_num_rows($query) > 0){
							while ($result = mysqli_fetch_array($query)){
					?>
					<tr>
						<td><?php echo $result['id']; ?></td>
						<td><?php echo $result['fname']; ?></td>
						<td><?php echo $result['lname']; ?></td>
						<td><?php echo $result['email']; ?></td>
						<td><?php echo $result['dob']; ?></td>
						<td><?php echo $result['gender']; ?></td>
					</tr>
					<?php
							}
						}
						else{
							echo "DB is empty";
						}
					?>		
				</tbody>
				
			</table>
		</div>
	</div>
</body>
</html>
