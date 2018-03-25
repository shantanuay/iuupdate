<?php

session_start();

$string = '';

for ($i = 0; $i < 5; $i++) {
	// this numbers refer to numbers of the ascii table (lower case)
	$string .= chr(rand(97, 122));
}

$_SESSION['rand_code'] = $string;

$dir = 'fonts/';

$image = imagecreatetruecolor(170, 60);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 70, 0, 0);  
$white = imagecolorallocate($image, 255, 255, 255);
$lightgrey = imagecolorallocate($image, 242, 242, 242);

imagefilledrectangle($image,0,0,399,99,$lightgrey);
imagettftext ($image, 30, 0, 10, 40, $color, $dir."recaptchaFont.ttf", $_SESSION['rand_code']);

header("Content-type: image/png");
imagepng($image);

?>