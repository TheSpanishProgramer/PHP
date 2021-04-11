<?php 

$anchura="220"; 
$hmax="190"; 

$ruta="imgnot/".$_GET['srca']; 
 $nombre=$ruta;

$datos = getimagesize($nombre); 
if($datos[2]==1){$img = @imagecreatefromgif($nombre);} 
if($datos[2]==2){$img = @imagecreatefromjpeg($nombre);} 
if($datos[2]==3){$img = @imagecreatefrompng($nombre);} 







$ratio = ($datos[0] / $anchura); 
$altura = ($datos[1] / $ratio); 
if($altura>$hmax) 
{$anchura2=$hmax*$anchura/$altura;$altura=$hmax;$anchura=$anchura2;} 
$thumb = imagecreatetruecolor($anchura,$altura); 
imagecopyresampled($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]); 
//marca de agua
$dat = getimagesize('marca.png');
if($dat[2]==2){$imgs = @imagecreatefromjpeg('marca.png');} 
 
$ratiod = ($dat[0] / $anchura); 
$alturad = ($dat[1] / $ratiod); 
if($alturad>$hmax) 
{$anchura2=$hmax*$anchura/$alturad;$alturad=$hmax;$anchura=$anchura2;} 
$thumba = imagecreatetruecolor($anchura,$alturad); 
imagecopyresampled($thumba, $imgs, 0, 0, 0, 0, $anchura, $alturad, $dat[0], $dat[1]); 
imagecopymerge($thumb,$thumba,0,0,0,0,220,15,25);

//codigo redondeo
$rad="10";
$radio = (int) $rad;
$diametro = $radio * 2 + 1;
$figura = imagecreatetruecolor($diametro, $diametro);
$fondo = imagecolorallocate($figura, 255, 255, 255);
imagefill($figura, 0, 0, $fondo);
$negro = imagecolorallocate($figura, 0, 0, 0);
imagefilledellipse($figura, $radio, $radio, $diametro, $diametro, $negro);
imagecolortransparent($figura, $negro);
$foto = $thumb;
$ancho = imagesX($foto);
$alto = imagesY($foto);
imagecopymerge($foto, $figura, 0, 0, 0, 0, $radio, $radio, 100);
imagecopymerge($foto, $figura, $ancho - $radio, 0, $radio + 1, 0, $radio, $radio, 100);
imagecopymerge($foto, $figura, 0, $alto - $radio, 0, $radio + 1, $radio, $radio, 100);
imagecopymerge($foto, $figura, $ancho - $radio, $alto - $radio, $radio + 1, $radio + 1, $radio, $radio, 100);
$transpa = imagecolorallocate($foto, 255, 255, 255);
imagecolortransparent($foto, $transpa);

//fin codigo redondeo

header("Content-Type: image/png");
imagepng($foto);
imagedestroy($figura);
imagedestroy($foto);
imagedestroy($thumb); 
imagedestroy($image);
?> 