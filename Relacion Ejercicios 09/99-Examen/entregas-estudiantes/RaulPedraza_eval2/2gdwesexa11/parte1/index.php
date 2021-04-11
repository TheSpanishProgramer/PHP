<?php
    session_start();
    $usuarios = array(
        "usu1" => array(
            "usuario" => "jvadillo",
            "pass" => 1234
        ),
        "usu2" => array(
            "usuario" => "jmalvido",
            "pass" => 4321
        )
    );

    if($_SESSION["nomUsu"] == null) {
        if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
            foreach ($usuarios as $usuario) {
                if ($usuario["usuario"] == $_POST["usuario"] && $usuario["pass"] == $_POST["pass"]) {

                    $_SESSION["nomUsu"] = $_POST["usuario"];
                    include_once "listaPacientes.php";
                } else
                    include_once "login.php";
            }

        } else
            require_once "login.php";
    }else
        include_once "listaPacientes.php"
?>
