<?php

 function merge($filename_x, $filename_y, $filename_result) {

 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($filename_x);
 list($width_y, $height_y) = getimagesize($filename_y);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_x + $width_y, $height_x);

 // Load images and then copy to destination image

 $image_x = imagecreatefrompng($filename_x);
 $image_y = imagecreatefrompng($filename_y);

 imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x);
 imagecopy($image, $image_y, $width_x, 0, 0, 0, $width_y, $height_y);

 // Save the resulting image to disk (as JPEG)

 imagepng($image, $filename_result);

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);


}
// merge('a.png', 'b.png', 'ab.png');


$arr = array('a','b','c','d','e','f','g','h','i','j','k','l','0','1','2');
for ($i = 0 ; $i < sizeof($arr) ;$i++) { 
	for ($b = 0 ; $b < sizeof($arr) ;$b++) { 
		for ($c = 0 ; $c < sizeof($arr) ;$c++) { 
			for ($d = 0 ; $d < sizeof($arr) ;$d++) { 
				merge($arr[$i].$arr[$b].".png", $arr[$c].$arr[$d].".png", $arr[$i].$arr[$b].$arr[$c].$arr[$d].".png");
			}
		}
	}
}

// $arr = array('a','b','c','d','e','f','g','h','i','j','k','l','0','1','2');
// for ($i = 0 ; $i < sizeof($arr) ;$i++) { 
// 	for ($b = 0 ; $b < sizeof($arr) ;$b++) { 
// 		merge($arr[$i].".png", $arr[$b].".png", $arr[$i].$arr[$b].".png");
// 	}
// }



/**
* 
*/
/*class captcha 
{
	private $arr = array('a','b','c','d','e','f','g');
	function __construct()
	{
		session_start();
		header ('content-type: image/png');
		$generatedCaptcha = $this->arr[rand(0,6)].$this->arr[rand(0,6)].$this->arr[rand(0,6)].$this->arr[rand(0,6)];
		$_SESSION['captcha'] = $generatedCaptcha;
		readfile($generatedCaptcha.".png");
	}
}
// new captcha(1);
new captcha();

*/
?>