<form method="POST" action="">
	<input type="number" name="val" placeholder="enter a number ">
	<button type="submit" name="sbmt">Find!!</button>
</form>

<?php 

if (isset($_POST['sbmt'])) {
	$num = $_POST['val'];
	$help = 1;

	while ($num > 1){
		$help = $num * $help;
		$num--;
	}

	echo $help;

}


?>