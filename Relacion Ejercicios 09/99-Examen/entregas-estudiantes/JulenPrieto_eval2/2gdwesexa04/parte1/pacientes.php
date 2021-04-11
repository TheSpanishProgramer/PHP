<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$codigo = "";
$nombre = "";
$apellidos = "";
$atendido = 0;




function rellenarTabla($codigo,$nombre,$apellidos,$atendido){
    echo ("
        <tr>$codigo</tr>
        <tr>$nombre</tr>
        <tr>$apellidos</tr>
        <tr>$atendido</tr>
        <tr><a href='#'>Marcar atendido</a></tr>
    
    ");

}

?>


<div id="div_addPaciente">
    <h1>Añadir nuevo</h1>
    <p>Descripción:</p>
    <form action="pacientes.php" method="post">
        <input type="text" name="codigo"  id="codigo"  value="<?php $codigo; ?>" placeholder="Código de paiente"/>
        <input type="text" name="nombre"  id="nombre" placeholder="nombre" value="<?php $nombre; ?>" />
        <input type="text" name="apellidos"  id="apellidos" placeholder="apellidos" value="<?php $apellidos; ?>" />
        <input type="submit" name="addPaciente" id="addPaciente" value="Añadir"/>
    </form>
</div>

<div id="div_ListarPacientes">
    <h2> Listado de pacientes</h2>
    <p>Si el valor entre paréntesis es 0, significa que no está atendido.</p>
    <table>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>¿Atendido?</th>
            <th>Atender</th>
        </tr>
        <tr>
            <?php  /*isset($_POST(addPaciente)){
                   rellenarTabla($codigo,$nombre,$apellidos,$atendido)
            }*/
            ?>
        </tr>
    </table>
    <a href="#">Borrar todos los pacientes</a>
</div>

</body>
</html>