<?php 
	define('TITLE', 'SubmitrequestSuccess');
	define('PAGE', 'Success');
	include 'include/header.php';
	session_start();
	if (!$_SESSION['login']['rEmail']){
		echo "<script>location.href= 'RequesterLogin.php'</script>";
	}
	include '../db_connection.php';
	$sql = "SELECT * FROM submitrequest_tb WHERE `request_id`={$_SESSION['login']['genid']}";
	$result = $conn->query($sql);

	if ($result->num_rows == 1){
		$row = $result->fetch_assoc();

		//Show result in a stylish Bootstrap Table

		echo "<div class='ml-5 mt-0'>
		<table class='table table-light'>
		<tbody>
			<tr>
				<th>Request ID</th>
				<td>".$row['request_id']."</td>
			</tr>

			<tr>
				<th>Name</th>
				<td>".$row['reqName']."</td>
			</tr>

			<tr>
				<th>Email ID</th>
				<td>".$row['requesterEmail']."</td>
			</tr>

			<tr>
				<th>Date</th>
				<td>".$row['date']."</td>
			</tr>

			<tr>
				<th>Request Info</th>
				<td>".$row['requestinfo']."</td>
			</tr>
			<tr>
				<th>Request Description</th>
				<td>".$row['requestdesc']."</td>
			</tr>

			<tr>
				<td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
			</tr>
		</tbody>
		</table>
		</div>
		";
	}

	include 'include/footer.php';
?>