<?php 
// 
session_start();

$rand = mt_rand(13210, 120113);

$_SESSION['ADMINCODE'] = $rand;

$image = imagecreatetruecolor(110, 40);

$r = mt_rand(200, 200);
$g = mt_rand(100, 200);
$b = mt_rand(170, 255);

$bg_color = imagecolorallocate($image, $r, $g, $b);

$a = mt_rand(0, 100);
$b = mt_rand(0, 100);
$c = mt_rand(0, 100);

$text_color = imagecolorallocate($image, $a,$b,$c);



imagefill($image, 0, 0, $bg_color);
$total_lines = 30;
// create lines on image
for ($i=0; $i < $total_lines; $i++){ 

	$x1 = mt_rand(0, 130);
	$y1 = mt_rand(30, 100);
	$x2 = mt_rand(00,100);
	$y2 = mt_rand(0, 150);

	imageline($image, $x1, $y1, $x2, $y2, $text_color);
}


imagestring($image, 21,  33, 13, $rand, $text_color);

header('content-type:image/jpeg');

imagejpeg($image);


?>
