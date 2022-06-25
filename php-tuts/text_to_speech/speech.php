<?php 
if (isset($_POST['submit'])){
	$text = $_POST['text'];

	$text = htmlspecialchars($text);

	 $text = rawurlencode($text);
	$html = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$text.'&tl=en-IN');

	// now display audio file here

	$player =  "<audio controls='controls'><source src='data:audio/mpeg;base64,".base64_encode($html)."'></source></audio>";
	echo $player;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Text to Speech in PHP</title>
</head>
<body>

	<form method="POST">
		<input type="textbox" name="text">
		<input type="submit" name="submit" value="Convert to Speech">
	</form>

	<audio>
		<source src="" type="">
	</audio>
</body>
</html>