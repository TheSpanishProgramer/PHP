<?php
function conn(){

    $servername = "localhost";
    $username = "root";
    $password = "";

   try{
       $dbh = new PDO("mysql:host=$servername;dbname=peliculas", $username, $password);
       $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
       return $dbh;
   }catch (PDOException $e){
       return $e->errorInfo();
       return null;
   }
}

function getUser($dbh,$usuario){
    $data = array(
        'usuario' => $usuario
    );
    $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt-> setFetchMode(PDO::FETCH_OBJ);
    $stmt ->execute($data);
        return $stmt->fetchObject();
}
function comprobarUsuario($dbh,$usuario,$contrasena){
    $userDB =  getUser($dbh,$usuario);
    if(getUser($dbh,$usuario) !=null){
        if($userDB->contrasena = $contrasena){
            return true;
        }else{
            return false;
        }
    }

}
function  selectAll($dbh){
    $stmt = $dbh->prepare("SELECT * FROM peliculas");
    $stmt-> setFetchMode(PDO::FETCH_OBJ);
    $stmt ->execute();
    return $stmt->fetchAll();
}
function  delete($dbh){
    $stmt = $dbh->prepare("DELETE  FROM peliculas");
    $stmt-> setFetchMode(PDO::FETCH_OBJ);
    $stmt ->execute();
}

function insert($dbh,$codigo,$titulo,$categoria,$ano){
    $data = array(
        'codigo' => $codigo,
        'titulo' => $titulo,
        'categoria' => $categoria,
        'ano' => $ano
    );
    $stmt = $dbh->prepare("INSERT INTO peliculas (codigo,titulo,categoria,ano,vista) VALUES (:codigo,:titulo,:categoria,:ano,0)");
    $stmt-> setFetchMode(PDO::FETCH_OBJ);
    $stmt ->execute($data);
}
function update($dbh,$codigo){
    $data = array(
        'codigo' => $codigo
    );
    $stmt = $dbh->prepare("UPDATE peliculas SET vista = 1 WHERE codigo = :codigo");
    $stmt-> setFetchMode(PDO::FETCH_OBJ);
    $stmt ->execute($data);
}


?>