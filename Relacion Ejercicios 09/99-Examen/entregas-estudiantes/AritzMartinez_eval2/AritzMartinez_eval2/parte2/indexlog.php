<?php
require_once "db_function.php";
$conn = connect();

if (isset($_GET['accion'])) {

    $accion = $_GET['accion'];
    switch ($accion) {
        case 'entrar':
            $usu = $_GET['usu'];
            $pass = $_GET['pass'];
            $usuarios = comprobarUsu($conn, $usu, $pass);
            foreach ($usuarios as $usu) {
                echo "<tr>
        <td>$usu->nombre</td>
        <td>$usu->contraseña</td>
         </tr>";
            }
            print_r($usuarios);
            require "indexLogin.php";
            break;
    }
}


?>