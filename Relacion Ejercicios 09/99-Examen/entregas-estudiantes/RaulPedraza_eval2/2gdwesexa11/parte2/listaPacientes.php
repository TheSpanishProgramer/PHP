<?php
    include_once "conexionBD.php";

    $dbh = connect();

    if($_GET["action"] == "Añadir") {
        if (isset($_GET["codigoPaciente"]) && isset($_GET["nombrePaciente"]) && isset($_GET["apellidosPaciente"])) {
            insertarPaciente($dbh,$_GET["codigoPaciente"],$_GET["nombrePaciente"],$_GET["apellidosPaciente"]);
        }
    } elseif ($_GET["action"] == "Borrar") {
            borrarPacientes($dbh);

    } elseif ($_GET["action"] == "Atendido") {
            actualizarPacientes($dbh,$_GET["codigoPaciente"]);
    }


    function llenarLista($dbh){
        $filas = seleccionarPacientes($dbh);
        $mensaje = "";
        foreach($filas as $fila){
            $mensaje = $mensaje . "<tr>
                                    <td>". $fila["codigo"]."</td>
                                    <td>". $fila["nombre"]."</td>
                                    <td>". $fila["apellidos"]."</td>
                                    <td>" .$fila["atendido"] ."</td>
                                    <td><a href='listaPacientes.php?codigoPaciente=".$fila["codigo"]."&action=Atendido'>Marcar Atendido</a></td>
                                   </tr>";
        }
        return $mensaje;
    }

    function seleccionarPacientes($dbh){
        $stmt = $dbh->prepare("select * from pacientes");
        $stmt->execute();
        $array = $stmt->fetchAll();

        var_dump($array);
        return $array;
    }

    function insertarPaciente($dbh,$codigo,$nombre,$apellidos){
        $data = array('codigo' => $codigo, 'nombre' => $nombre, 'apellidos' => $apellidos, 'atendido' => 0);
        $stmt = $dbh->prepare("insert into pacientes (codigo,nombre,apellidos,atendido) values (:codigo,:nombre,:apellidos,:atendido)");
        $stmt->execute($data);
    }

    function borrarPacientes($dbh){
        $stmt = $dbh->prepare("delete from pacientes");
        $stmt->execute();
    }

    function actualizarPacientes($dbh,$codigo){
        $data= array('codigo' => $codigo);

        $stmt = $dbh->prepare("update pacientes set atendido = 1 where codigo = :codigo");
        $stmt->execute($data);
    }
?>

<html>
    <head>
        <title>Lista de Pacientes</title>
    </head>
    <body>
        <h1>Añadir nuevo</h1>
        <form action="listaPacientes.php" method="get">
            Descripcion:
            <input type="text" name="codigoPaciente">
            <input type="text" name="nombrePaciente">
            <input type="text" name="apellidosPaciente">
            <input type="submit" name="action" value="Añadir">
        </form>
        <h1>Listado de pacientes</h1>
        <p>Si el valor entre paréntesis es 0, significa que el paciente no está atendido</p>
        <table>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>¿Atendido?</th>
                <th>Atender</th>
            </tr>
            <?php echo llenarLista($dbh)?>
        </table>
        <p><a href="listaPacientes.php?action=Borrar">Vaciar Lista</a></p>
    </body>
</html>
