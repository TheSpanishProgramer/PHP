<?php
require_once 'db_functions.php';

$db = connect();

// Comprobamos si el usuario a realizado alguna acción:
if(isset($_GET["accion"])) {
    $accion = $_GET["accion"];
    switch ($accion) {
        case 'insertar':
            $texto = $_GET["texto"];
            insert($db,$texto);
            break;
        case 'eliminar':
            $id = $_GET["id"];
            deleteById($db,$id);
            break;
        case 'vaciar':
            deleteAll($db);
    }
}

$items = getAll($db);

function crearLista($items) {
    echo "<ul>";
    foreach ($items as $item) {
        echo "<li>{$item->texto} (<a href='index.php?accion=eliminar&id={$item->id}'>Eliminar</a>)</li>";
    }
    echo "</ul>";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>
<h4>Lista de compra</h4>
<?php crearLista($items) ?>
<br>
<h5>Añadir elemento</h5>
<form action="index.php" method="get">
    <input type="text" name="texto">
    <input type="hidden" name="accion" value="insertar">
    <input type="submit" value="Añadir">
</form>
<br>
<a href="index.php?accion=vaciar">Vaciar lista</a>

</body>
</html>

