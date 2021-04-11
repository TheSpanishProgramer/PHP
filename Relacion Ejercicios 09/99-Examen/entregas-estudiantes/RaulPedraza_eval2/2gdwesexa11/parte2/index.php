<?php
    session_start();
    include_once "conexionBD.php";

    if(isset($_POST["usuario"]) && isset($_POST["pass"])){
        $dbh = connect();
        $comprobacion = comprobarUsuario($dbh,$_POST["usuario"],$_POST["pass"]);

        if($comprobacion == true){

            $_SESSION["nomUsuario"] = $_POST["usuario"];
            include "listaPacientes.php";

        }else
            include "login.php";
    }else
        require "login.php";


    function comprobarUsuario($dbh,$usuario,$pass){

        $stmt = $dbh->prepare("Select * from usuarios");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()){
            $comprobacion = false;
            if($row["usuario"] == $usuario && $row["contrsena"] == $pass){
                $comprobacion = true;
            }
        }
        return $comprobacion;
    }
?>
