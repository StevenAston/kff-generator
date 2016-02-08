<?php

//Leave all this stuff as it is
date_default_timezone_set('Europe/London');
include 'GIFEncoder.class.php';
include 'php52-fix.php';
$time = $_GET['time'];
$future_date = new DateTime('2016-02-06 10:00:00');
$time_now = time();
$now = new DateTime(date('r', $time_now));
$frames = array();
$delays = array();


// Your image link
$image = imagecreatefrompng('images/bg.png');

$phoneNumberVariables = array(
	'size' => 40, // Font size, in pts usually.
	'aOBngle' => 0, // Angle of the text
	'x-offset' => 356, // The larger the number the further the distance from the left hand side, 0 to align to the left.
	'y-offset' => 390, // The vertical alignment, trial and error between 20 and 60.
	'file' => __DIR__ . DIRECTORY_SEPARATOR . 'helvetica.otf', // Font path
	'color' => imagecolorallocate($image, 255, 255, 255), // RGB Colour of the text
	);

$emailAddressVariables = array(
	'size' => 40, // Font size, in pts usually.
	'aOBngle' => 0, // Angle of the text
	'x-offset' => 356, // The larger the number the further the distance from the left hand side, 0 to align to the left.
	'y-offset' => 390, // The vertical alignment, trial and error between 20 and 60.
	'file' => __DIR__ . DIRECTORY_SEPARATOR . 'helvetica.otf', // Font path
	'color' => imagecolorallocate($image, 255, 255, 255), // RGB Colour of the text
	);

// Open the first source image and add the text.
$image = imagecreatefrompng('images/bg.png');
$phoneNumber = '519-111-1111';
$emailAddress = 'Heather.heartfield@kff.ca';

imagettftext ($image , $phoneNumberVariables['size'] , $phoneNumberVariables['angle'] , $phoneNumberVariables['x-offset'] , $phoneNumberVariables['y-offset'] , $phoneNumberVariables['color'] , $phoneNumberVariables['file'], $phoneNumber );
imagettftext ($image , $emailAddressVariables['size'] , $emailAddressVariables['angle'] , $emailAddressVariables['x-offset'] , $emailAddressVariables['y-offset'] , $emailAddressVariables['color'] , $emailAddressVariables['file'], $emailAddress );
ob_start();
imagegif($image);
$frames[]=ob_get_contents();
$delays[]=$delay;
$loops = 1;
ob_end_clean();


//expire this image instantly
header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );
$gif = new AnimatedGif($frames,$delays,$loops);
$gif->display();
