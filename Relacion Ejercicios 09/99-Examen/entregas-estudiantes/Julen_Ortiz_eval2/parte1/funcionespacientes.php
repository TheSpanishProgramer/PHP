<?php
$cont = 0;
$_SESSION['atendido']=0;

if(!isset($_SESSION["arrayPAcientes"])) {
    $_SESSION["arrayPAcientes"] = array();
}
$pacientes=[
    1=>[
        "codigo"=>"0001",
        "nombre"=>"Jon",
        "apellidos"=>"Vadillo Romero",
        "atendido"=>"0",
    ]
];
if(isset($_GET["idPaciente"],$_GET["nomPaciente"],$_GET["apePaciente"])){
    $idPaciente = $_GET["idPaciente"];
    $nomPaciente = $_GET["nomPaciente"];
    $apePaciente = $_GET["apePaciente"];
    añadirPaciente($idPaciente,$nomPaciente,$apePaciente,$cont);
}
function añadirPaciente($idPaciente,$nomPaciente,$apePaciente,$cont){
    $nuevapersona=[
        $cont=>[
            "codigo"=>$idPaciente,
            "nombre"=>$nomPaciente,
            "apellidos"=>$apePaciente,
            "atendido"=>$_SESSION['atendido'],
        ]
    ];

    $cont++;
    array_push($pacientes,$nuevapersona);


}
$_SESSION{"arraypacientes"} = $pacientes;
function rellenarPacientes(){
    foreach ($_SESSION{"arraypacientes"} as $key){
        echo "<tr>
                <td>$key[codigo]</td>
                <td>$key[nombre]</td>
                <td>$key[apellidos]</td>
                <td>$key[atendido]</td>
                <td><a href='pacientes.php?accion=atendido'>Marcar atendido</a></td>
        </tr>";
    }
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
    $_SESSION['atendido']=1;
}
function borrarTodos(){
    $_SESSION["arrayPacientes"] = array();
    }

