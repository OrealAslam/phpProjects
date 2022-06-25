<?php 

$rand = mt_rand(1218760, 7645713);

$image = imagecreatetruecolor(110, 40);

$bg_color = imagecolorallocate($image, 255, 115, 170);

$text_color = imagecolorallocate($image, 255, 215, 170);

imagefill($image, 4, 4, $bg_color);

imagestring($image, 12, 22, 11, $rand, $text_color);

// header('Content_type: image/jpeg');
header('content-type:image/jpeg');

imagejpeg($image);
?>