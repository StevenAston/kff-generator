<?php
include 'php52-fix.php';
include 'imagettftextblur.php';

// Your image link
$image = imagecreatefrompng('images/bg.png');

$phoneNumberVariables = array(
	'size' => 32, // Font size, in pts usually.
	'aOBngle' => 0, // Angle of the text
	'x-offset' => 392, // The larger the number the further the distance from the left hand side, 0 to align to the left.
	'y-offset' => 390, // The vertical alignment, trial and error between 20 and 60.
	'file' => __DIR__ . DIRECTORY_SEPARATOR . 'helvetica.otf', // Font path
	'color' => imagecolorallocate($image, 255, 255, 255), // RGB Colour of the text
	'blurColor' => imagecolorallocate($image, 0, 0, 0), // RGB Colour of the text
	'blur' => 10, // Blur amount
	);

$emailAddressVariables = array(
	'size' => 32, // Font size, in pts usually.
	'aOBngle' => 0, // Angle of the text
	'x-offset' => 392, // The larger the number the further the distance from the left hand side, 0 to align to the left.
	'y-offset' => 450, // The vertical alignment, trial and error between 20 and 60.
	'file' => __DIR__ . DIRECTORY_SEPARATOR . 'helvetica.otf', // Font path
	'color' => imagecolorallocate($image, 255, 255, 255), // RGB Colour of the text
	'blurColor' => imagecolorallocate($image, 0, 0, 0), // RGB Colour of the text
	'blur' => 10, // Blur amount
	);

// Open the first source image and add the text.
$image = imagecreatefrompng('images/bg.png');
$phoneNumber = $_GET['number'];
$emailAddress = $_GET['email'];;

imagettftextblur ($image , $phoneNumberVariables['size'] , $phoneNumberVariables['angle'] , $phoneNumberVariables['x-offset'] , $phoneNumberVariables['y-offset'] , $phoneNumberVariables['blurColor'] , $phoneNumberVariables['file'], $phoneNumber, $phoneNumberVariables['blur']);
imagettftextblur ($image , $phoneNumberVariables['size'] , $phoneNumberVariables['angle'] , $phoneNumberVariables['x-offset'] , $phoneNumberVariables['y-offset'] , $phoneNumberVariables['color'] , $phoneNumberVariables['file'], $phoneNumber );
imagettftextblur ($image , $emailAddressVariables['size'] , $emailAddressVariables['angle'] , $emailAddressVariables['x-offset'] , $emailAddressVariables['y-offset'] , $emailAddressVariables['blurColor'] , $emailAddressVariables['file'], $emailAddress, $emailAddressVariables['blur']);
imagettftextblur ($image , $emailAddressVariables['size'] , $emailAddressVariables['angle'] , $emailAddressVariables['x-offset'] , $emailAddressVariables['y-offset'] , $emailAddressVariables['color'] , $emailAddressVariables['file'], $emailAddress );
ob_start();
imagepng($image);
ob_end_clean();


//expire this image instantly
//header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
//header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
//header( 'Cache-Control: no-store, no-cache, must-revalidate' );
//header( 'Cache-Control: post-check=0, pre-check=0', false );
//header( 'Pragma: no-cache' );
$png = $image;
$png->display();
