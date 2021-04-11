<?php

function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$servername;dbname=pacientes", $username, $password);
    return $conn;
}
?>