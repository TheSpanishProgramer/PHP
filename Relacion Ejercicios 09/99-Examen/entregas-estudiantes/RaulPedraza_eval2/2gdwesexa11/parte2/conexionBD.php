<?php
function connect(){
    $servername = "localhost";
    $myDB = "pacientes";
    $username = "root";
    $password = "";

    $dbh = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    return $dbh;
}
