<h2>Formulario subida de archivos</h2>
<html>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
    <input type="file" name="imagenes[]" multiple="multiple" />
    <input type="submit" name="submit" />
</form>
</body>
</html>
<?php
$directorioSubida = "uploads/";
$max_file_size = "51200";
if(isset($_POST["submit"]) && isset($_FILES['imagenes'])){
    $nombres = $_FILES['imagenes']['name'];
    $temporales = $_FILES['imagenes']['tmp_name'];
    $tipos = $_FILES['imagenes']['type'];
    $errores = $_FILES['imagenes']['error'];
    // Iteramos sobre los arrays creados
    for ($i = 0; $i < count($temporales); $i++){
        if(move_uploaded_file($temporales[$i], $directorioSubida.$nombres[$i])){
            echo "Se ha subido {$nombres[$i]} correctamente <br>";
        } else {
            echo "Ha habido algún error al subir algún archivo";
        }
    }
}