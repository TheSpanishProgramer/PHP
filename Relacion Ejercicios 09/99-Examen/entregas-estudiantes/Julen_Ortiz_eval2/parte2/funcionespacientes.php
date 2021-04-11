<?php
require "conexion.php";

$_SESSION['atendido']=0;

if(isset($_GET["idPaciente"],$_GET["nomPaciente"],$_GET["apePaciente"])){
    $idPaciente = $_GET["idPaciente"];
    $nomPaciente = $_GET["nomPaciente"];
    $apePaciente = $_GET["apePaciente"];
    anadirPaciente($idPaciente,$nomPaciente,$apePaciente);
}
function anadirPaciente($idPaciente,$nomPaciente,$apePaciente){

    $dbh = connect();

    $data=array("codigo"=>$idPaciente,"nomPaciente"=>$nomPaciente,"apePaciente"=>$apePaciente);
    $stmt=$dbh->prepare("insert into pacientes(codigo,nombre,apellidos,atendido)values(:codigo,:nomPaciente,:apePaciente,0)");
    $stmt->execute($data);

    close($dbh);
}
function rellenarPacientes(){
    $dbh = connect();

    $stmt=$dbh->prepare("select * from pacientes");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    foreach($row=$stmt as $key){
        echo "<tr>
                <td>$key[codigo]</td>
                <td>$key[nombre]</td>
                <td>$key[apellidos]</td>
                <td>$key[atendido]</td>
                <td><a href='pacientes.php?accion=atendido'>Marcar atendido</a></td>
        </tr>";
    }
    close($dbh);

}
if(isset($_GET['accion'])){
    $accion = $_GET['accion'];
}

switch($accion){
    case 'atendido':
        mostrarAtendido();
        break;
    case 'borrar':
        borrarTodos();
        break;
}

function mostrarAtendido(){
    $dbh = connect();

    $stmt=$dbh->prepare("update pacientes where atendido=0 set atendido=1 ");
    $stmt->execute();

    close($dbh);
}
function borrarTodos(){
    $dbh = connect();

    $stmt=$dbh->prepare("delete * from pacientes");
    $stmt->execute();

    close($dbh);
}

