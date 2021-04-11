<?php
function connect($host, $dbname, $user, $pass)
{
    $servername = $host;
    $username = $user;
    $password = $pass;
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    return $dbh;
}