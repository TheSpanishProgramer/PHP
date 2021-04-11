<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        7.- Ficheros
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="" title="Color">
</head>

<body>
<h1>7.- Ficheros</h1>

<?php

if (file_exists("documentos") == false) {
    mkdir("documentos", 0777);
}

//datos del arhivo
$nombre_archivo = $_FILES['fichero']['name'];
$tipo_archivo = $_FILES['fichero']['type'];
$tamano_archivo = $_FILES['fichero']['size'];

//datos de la imagen
$nombre_imagen = $_FILES['imagen']['name'];
$tipo_imagen = $_FILES['imagen']['type'];
$tamano_imagen = $_FILES['imagen']['size'];

//compruebo si las características del archivo son las que deseo

if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_imagen, "jpeg")) && ($tamano_imagen < 5000000))) {
    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf o .jpg<br><li>se permiten archivos de 5 Mb máximo.</td></tr></table>";
}else{
    if (move_uploaded_file($_FILES['fichero']['tmp_name'], "documentos/".$nombre_archivo)){
        echo "El archivo ha sido cargado correctamente.";
    }else{
        echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
    }

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], "documentos/".$nombre_imagen)){
        echo "La imagen ha sido cargada correctamente.";
    }else{
        echo "Ocurrió algún error al subir la imagen. No pudo guardarse.";
    }
}



?>

<p><img src="documentos/<?php echo $nombre_imagen;?>" style="width: auto; height: auto;max-width: 560px;max-height: 400px">


<p><a href="index.html">Volver al formulario.</a></p>

<footer>
</footer>
</body>
</html>

