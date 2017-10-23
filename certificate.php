<?php
$code = $_GET['name'];
$evaluation = ' Вы справились с тестом!';

$image = imagecreatetruecolor(600, 412);
$backColor = imagecolorallocate($image,  255, 221, 0);
$textColor = imagecolorallocate($image, 0, 133, 11);

$fontFile = __DIR__. './roboto_black.ttf';
if (!file_exists($fontFile)) {
  echo 'Файл со шрифтом не найден!';
  exit;
}

$imBox = imagecreatefrompng( __DIR__. './image/certificate.png');

imagefill($image, 0, 0, $backColor);
imagecopy($image, $imBox, 10, 10, 0, 0, 578, 392);
imagettftext($image, 55, 0, 150, 200, $textColor, $fontFile, $code);
imagettftext($image, 25, 0, 100, 270, $textColor, $fontFile, $evaluation);
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
imagedestroy($imBox);
?>