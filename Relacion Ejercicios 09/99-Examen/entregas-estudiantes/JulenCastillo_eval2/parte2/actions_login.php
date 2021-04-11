<?php
include_once "BD.php";


if (isset($_GET['username']) && !empty($_GET['username']) && isset($_GET['password']) && !empty($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];


comprobarDatosLogin($dbh, $username,$password);



};
?>