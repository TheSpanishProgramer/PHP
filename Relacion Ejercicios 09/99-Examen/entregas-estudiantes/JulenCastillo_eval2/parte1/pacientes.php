<?php

session_start();


//Creamos array de pacientes

if (isset($_GET["codigoPaciente"]) && !empty($_GET["codigoPaciente"]) && isset($_GET["nombrePaciente"]) && !empty($_GET["nombrePaciente"]) && isset($_GET["apellidoPaciente"]) && !empty($_GET["apellidoPaciente"])) {

    $codigoP = $_GET["codigoPaciente"];
    $nombreP = $_GET["nombrePaciente"];
    $apellidoP = $_GET["apellidoPaciente"];
    $atendido = 0;

//Creamos array asociativo de cada paciente

        $paciente = array(
            "codigo" => $codigoP,
            "nombre" => $nombreP,
            "apellido" => $apellidoP,
            "atendido" => $atendido
        );



    if (!isset($_SESSION["pacientes"])){

        echo "No existe el array";

        $pacientes = array();
        array_push($_SESSION["pacientes"],$paciente);
        echo $pacientes;


    }
    else{
        echo "existe";
        array_push($_SESSION["pacientes"],$paciente);
        echo $_SESSION['pacientes'];
    }

    //metemos en el array de pacientes cada paciente y lo guardamos en sesion




        function pintarTabla(){

//Cogemos el array de la session
            $array_pacientes =  $_SESSION["pacientes"];

            foreach ($array_pacientes as $paciente){

                echo "<td>" . $paciente['codigo']  . "<td>";
                echo "<td>" . $paciente['nombre']  . "<td>";
                echo "<td>" . $paciente['apellido']  . "<td>";
                echo "<td>" . $paciente['atendido']  . "<td>";
                echo "<td>"  . "<a href='pacientes.php?atender=1'> Atender  </a>"  . "<td>";
                
            }
        }


}


?>

<html>
<head><title>Pacientes</title></head>

<body>


<h1>Añadir Nuevo</h1>
<form action="pacientes.php" method="get">
<label>Descripcion:</label>
<input type="text" name="codigoPaciente" placeholder="Codigo del paciente...">
<input type="text" name="nombrePaciente" placeholder="Nombre...">
<input type="text" name="apellidoPaciente" placeholder="Apellido...">

    <input type="submit" value="añadir">
</form>

<h1>LISTA DE PACIENTES</h1>
<table>
<thead>
<tr>
    <th>Codigo</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Atendido?</th>
    <th>Atender</th>
</tr>
</thead>
    <tbody>
    <tr>
    <?php pintarTabla()?>
    </tr>
    </tbody>


</table>
</body>
</html>
