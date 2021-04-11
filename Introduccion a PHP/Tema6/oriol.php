<?
header ("Content-type: image/gif");
$imagen = imagecreate(500, 200);
$negro = imagecolorallocate($imagen, 0, 0, 0);
imagerectangle ($imagen, 20, 20, 150, 80, $color);
imagegif($imagen);
imagedestroy($imagen);
?>