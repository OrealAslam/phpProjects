<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Age in Days</title>
</head>
<body>
	
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<select name="select">
			<?php 
			for ($year=1930; $year<=2021 ; $year++) { 
				echo '<option value="'.$year.'">'.$year.'</option>';
			}
			?>
		</select>
		<button type="submit" name="enterDOB">Proceed</button>
	</form>

<?php 
date_default_timezone_set("Asia/Karachi");
if (isset($_POST['enterDOB']) and isset($_POST['select'])){
	$select = $_POST['select'];
	$year = getdate()['year'];	

	$age = $year - $select;
}

?>

<?php 
	if(isset($age)){
		echo "<h4>Your age is : $age</h4>";
	} 
	echo date('h:m:s A e');
?>

</body>
</html>