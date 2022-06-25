<?php 
// session_start();
// 	if (isset($_POST['submit'])){
// 		$code = $_SESSION['code'];
// 		print_r($_SESSION['code']);
// 		 if($_POST['code'] == $code){
// 		 	echo "<br>Matched";
// 		 }
// 		 else{
// 		 	echo "Mis-matched";
// 		 }
// 	}

echo $mt_rand = mt_rand(1111, 99999);
$_SESSION['mt_rand'] = $mt_rand;

$user_input = $_POST['code'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Captcha Security</title>
</head>
<body>
	<form method="POST" action="captcha_run.php">
		<input type="text" name="code"><br>
		<input type="submit" name="submit" value="Send">
	</form>

	<div>
		<?php 
			if ((!$_POST['code']) == $mt_rand){
				echo "Mismatched Captcha";
			}
			else{
				echo "Captcha matched successfully!!!";
			}
		?>
	</div>
</body>
</html>