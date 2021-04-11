<?php
    session_start();
    if($_SESSION["pacientes"] == null){
        $_SESSION["pacientes"] = array();
    }
    if($_GET["action"] == "Añadir") {
        if (isset($_GET["codigoPaciente"]) && isset($_GET["nombrePaciente"]) && isset($_GET["apellidosPaciente"])) {
            $paciente = array(
                "codigo" => $_GET["codigoPaciente"],
                "nombre" => $_GET["nombrePaciente"],
                "apellidos" => $_GET["apellidosPaciente"],
                "atendido" => atendido(),

            );
            array_push($_SESSION["pacientes"], $paciente);
        }
    }elseif($_GET["action"] == "Borrar"){
        unset($_SESSION["pacientes"]);
    }

    function llenarLista(){
        $filas = "";
        foreach($_SESSION["pacientes"] as $paciente){
            $filas = $filas . "<tr>
                                <td>". $paciente["codigo"]."</td>
                                <td>". $paciente["nombre"]."</td>
                                <td>". $paciente["apellidos"]."</td>
                                <td>" . atendido() ."</td>
                                <td><a href='listaPacientes.php?codigoPaciente=".$paciente["codigo"]."&action=Atendido'>Marcar Atendido</a></td>
                               </tr>";
        }
        return $filas;
    }

    function atendido(){
        $mensaje ="";
        if($_GET["action"] == "Atendido"){
            $mensaje = $mensaje . 1;
        } else
            $mensaje = $mensaje . 0;
        return $mensaje;
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
            <?php echo llenarLista()?>
        </table>
        <p><a href="listaPacientes.php?action=Borrar">Vaciar Lista</a></p>
    </body>
</html>
