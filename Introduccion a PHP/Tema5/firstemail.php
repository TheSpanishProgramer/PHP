<?														//son cabeceras, de quien procede y la forma
$hdr="MIME-Version: 1.0\n"; 							//servicio anti spam es si falta alguna cabecera o esta mal estructurado
$hdr.="Content-type: text/html; charset=iso-8859-1\n"; 	//se dice que se codifica en html con el charset
$hdr.="Content-Transfer-Encoding: 8bit\n"; 				
$hdr.="X-Priority: 1\n"; 								//prioridad 1 mas alta, hasta el 9
$hdr.="X-MSMail-Priority: High\n"; 
$hdr.="From: \"Trabajator Team\" <info@cibernarium.cat>\n"; //quien envia el mail y la direccion
$bod.="<body style='margin:0px;'>\n<center>\n<table cellpadding='0' cellspacing='0' width='1024'>\n<tr>\n<td>\n<table cellpadding='0' cellspacing='0' width='685' height='144'>\n<tr>\n<td width='685' background='http://www.corporate.trabajator.es/images/tituloemail.jpg'>\n</td>\n\n\n</tr>\n</table>\n</td>\n</tr>\n<tr>\n<td bgcolor='#FFFFFF' width='1024'>\n";
$bod.="<table cellpadding='10' cellspacing='0'><tr><td><font size='3'>Bienvenid@ ".$name.",\n<p>\nTe damos de nuevo la bienvenida y queremos agradecer la confianza que has depositado en nosotros.\n<p>\nA continuaci&#243;n pulsa el enlace para poder completar tu registro y activar tu cuenta:\n<p>\n<a href='http://www.digiocio.es/php/userp13/Tema5/conf.php?cod=".$usuario."'>'http://www.digiocio.es/php/userp13/Tema5/conf.php?cod=".$usuario."</a>\n<p>\n";
$bod.="Gracias por todo y cualquier duda dirigela a info@trabajator.es\n<p>\n<p>\nAtentamente,\n<p>\nEquipo de Corporate Trabajator\n";
$bod.="</td>\n</tr>\n</table>\n</td>\n</tr>\n</table>\n</center>\n"; //las imagenes es bueno poner solo la url para que no te cace el anti spam
$bod.="</body>\n</html>\n"; 
@mail($email,"Alta en Trabajator Team",$bod,$hdr);

// $email, es el mail al que queremos mandar el mensaje
// $bod es la cadena de toda las cabeceras del mail
?>