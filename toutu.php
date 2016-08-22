<?php
header("content-type:image/png");
$name = $_GET['name']?$_GET['name']:"马大哈";
//$xuexiao = $_GET['xuexiao']?$_GET['xuexiao']:"1";
$text = $name;


$fontsize=300;

$long =mb_strlen($text, 'utf-8');
if($long < 7)
{
$fontsize=300;

}else{

$fontsize=220;
}

//$filename= $xuexiao.'.png';
$filename= '1.png';
$bg = imagecreatefrompng($filename);
$arr = getimagesize($filename);

$width=$arr[0];
$height=$arr[1];

$im = imagecreatetruecolor($width,$height);
imagecopy($im,$bg,0,0,0,0,$width,$height);
imagedestroy($bg);
$black = imagecolorallocate($im, 0, 0, 0);
$font = './msyh.ttf';

  $fontBox = imagettfbbox($fontsize, 0, $font, $text);
  $x = ceil(($width - $fontBox[2]) / 2);
  $y = 600; 


imagettftext($im, $fontsize, 0, $x, $y, $black, $font, $text);

imagepng($im);
imagedestroy($im);
?>