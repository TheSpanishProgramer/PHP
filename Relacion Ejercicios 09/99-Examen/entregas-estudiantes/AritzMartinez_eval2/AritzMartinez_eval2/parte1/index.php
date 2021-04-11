<?php
echo "Hola examen!";
session_start();


$cod = $_GET['codigo'];
$nom = $_GET['nombre'];
$ape= $_GET['apellidos'];
$ate = $_GET['atendido'];

llenarSession($cod,$nom,$ape,$ate);

function llenarSession($cod,$nom,$ape,$ate){
    $_SESSION['session'] = array();
    $_SESSION['session'].array_push($cod,$nom,$ape,$ate);
}

function generarLista(){

    foreach ($_SESSION['session'] as $item) {
        echo "<tr>
        <td>$item->codigo</td>
        <td>$item->nombre</td>
        <td>$item->apellidos</td>
        <td>$item->atendido</td>
        <td><a href='index.php?accion=borrar'>Atender </td>
         </tr>";
    }
    print_r($_SESSION['session']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
generarLista();
?>
<form action="index.php" method="get">
    <input type="text" name="codigo">
    <input type="text" name="nombre">
    <input type="text" name="apellidos">
    <input type="text" name="atendido">
    <input type="submit" value="Insertar">
</form>
</body>
</html>
