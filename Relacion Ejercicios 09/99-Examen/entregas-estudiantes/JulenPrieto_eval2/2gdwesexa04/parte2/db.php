<?php




function dbh(){


    $servername = "localhost";
    $username = "root";
    $password = "";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
        return $conn;
    }catch($dbh){
        echo "Error al conectar la bd";
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    }

}
function seleccionarPacientes($conn){

    //$stmt = $conn -> "SELECT * FROM pacientes";

}

function insertPaciente($conn){
    //$stmt = $conn -> "INSERT.................."
}
function borrarPaciente($conn){
    //$stmt = $conn -> "DELETE FROM pacientes WHERE codigo = :codigo";
}


?>

