<?

header ("Content-type: image/png");

$imagen = imagecreate (300,200);
$color= imagecolorallocate($imagen,123,255,0)
imagefilledrectangle($imagen,0,0,300,200,$color);


imagepng ($imagen);
imagedestroy ($imagen);

?>