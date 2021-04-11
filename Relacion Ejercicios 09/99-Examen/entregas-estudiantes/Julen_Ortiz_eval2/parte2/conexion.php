<?php
function connect(){
    $servername = "localhost";
    $username = "username";
    $password = "password";

    $dbh = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    return $dbh;
}

function close($dbh){
    $dbh=null;
}