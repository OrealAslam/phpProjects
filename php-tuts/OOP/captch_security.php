<?php 
session_start();
header('Content-type:image/jpeg');

$font_size = 32;
// here we specify the Captcha (captcha width) width
$text      = $_SESSION['code'] = mt_rand(0000, 9999);
?>
<form method="POST">
		<?php echo '<img src="captch_security.php"><br>'?>
		<input type="text" name="code"><br>
		<input type="submit" name="submit" value="Send">
	</form>
<?php	
//$width     = 150;
//$height	   = 40;

// Now we create the image suing imagecreate(); function

/*
	Syntax of {imagecreate()} function
	Basically this function belongs to GD library 

	imagecreate($img_width, $img_height);
*/

	//$image = imagecreate($width, $height);

	// Now we specify image background color using {imagecolorallocate()} function

	/*
		Syntax of imagecolorallocate() function
		imagecolorallocate($image, red, green, bule);
	*/ 
		//imagecolorallocate($image, 205, 115, 215);

		// Now we specify font color
		// Here rgb value is the value of text color

		//$font_color = imagecolorallocate($image ,0 ,0 ,0);

	// Now we require a font (we cant get it from control panel > Fonts)

		//imagettftext($image, $font_size, 0, 20, 40, $font_color, 'font.ttf', $text);
		// Now finally the image will be created

		//echo imagejpeg($image);
	
?>