<?php 
if (isset($_GET['addValue'])){

	if (isset($_GET['queueValue'])){

		$value = $_GET['queueValue'];

		header("Location: http://localhost/queueAlgo/queue.php");
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Queue Algorithm</title>
</head>
<body>

	<form method="GET" action="queue.php">
		<input type="number" name="queueValue" placeholder="queue value">
		<button type="submit" name="addValue">Add to queue</button>
	</form>
</body>
</html>