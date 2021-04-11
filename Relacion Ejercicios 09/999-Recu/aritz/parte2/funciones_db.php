<?php

function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try{
        $dbh = new PDO("mysql:host=$servername;dbname=peliculas", $username, $password);
        return $dbh;
    }catch (PDOException $e){
        echo $e->getMessage();
        returnnull;
    }

}

function selectAllUsuarios($dbh){
    $stmt = $dbh->prepare("Select * from usuarios");
    $stmt->execute();
    return $stmt->fetchAll();

}

function selectAll($dbh){
    $stmt = $dbh->prepare("Select * from peliculas");
    $stmt->execute();
    return $stmt->fetchAll();

}

function insert($dbh,$codigo,$titulo,$categoria,$ano){
    $data = array('codi'=>$codigo,'titu'=>$titulo,'cate'=>$categoria,'ano'=>$ano);
    $stmt = $dbh->prepare("Insert into peliculas (codigo,titulo,categoria,ano,vista) values(:codi,:titu,:cate,:ano,0)");
    $stmt->execute($data);
}

function update($dbh,$id){
    $data = array('id'=>$id);
    $stmt = $dbh->prepare("Update peliculas set vista = 1 where id = :id");
    $stmt->execute($data);
}



function delete($dbh){
    $stmt = $dbh->prepare("Delete from peliculas");
    $stmt->execute();
}






?>