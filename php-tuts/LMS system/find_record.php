<!DOCTYPE html>
<html>
<head>
	<title>Student Record</title>
		<link rel="stylesheet" type="text/css" href="css//student_database_preview.css">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
	</head>
<body>
	<div id="container">
		<h3>Students Record</h3>
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
	
<?php
	if (isset($_POST['find'])){
			$connection = mysqli_connect("localhost", "root","", "lms system");
		if (mysqli_connect_errno()){
			die(mysqli_connect_error());
		}
		$sql = "SELECT `id`, `fname`, `lname`, `email`, `dob`, `gender` FROM `stu_register` WHERE `id` = ?";
		$stmt = mysqli_prepare($connection, $sql);
		if ($stmt){
			$id = filter_var($_POST['search'], FILTER_VALIDATE_INT);
				mysqli_stmt_bind_param($stmt, 'i', $_POST['search']);
				mysqli_stmt_bind_result($stmt, $db_id, $db_fname, $db_lname, $db_email, $db_dob, $db_gender);
				$result = mysqli_stmt_execute($stmt);
				mysqli_stmt_fetch($stmt);
				if ($result){
					?>
					<tbody>
						<tr>
							<td><?php echo $db_id; ?></td>
							<td><?php echo $db_fname; ?></td>
							<td><?php echo $db_lname; ?></td>
							<td><?php echo $db_email; ?></td>
							<td><?php echo $db_dob	; ?></td>
							<td><?php echo $db_gender; ?></td>
						</tr>
					</tbody>
					<?php
				}
				else{
					echo "No result found against id: ".$id;
				}
		}
	}

?>
	</div>

	<div class="move-back">
		<button><a href="student_db_table.php">Back</a></button>
	</div>
</body>
</html>