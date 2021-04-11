<?php
namespace Clases;
use PDO;
use PDOException;

class Conexion{
    protected static $conexion;
    public function __construct()
    {
        if(self::$conexion==null){
            $this->crearConexion();
        }
    }
    private function crearConexion(){
        $opciones=parse_ini_file("../config.ini");
        $usuario=$opciones["usuario"];
        $base=$opciones["base"];
        $pass=$opciones["pass"];
        $host=$opciones["host"];
        $dsn="mysql:host=$host;dbname=$base;charset=utf8mb4";
        try{
            self::$conexion=new PDO($dsn, $usuario, $pass);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $ex){
            die("Error al conectar: ".$ex->getMessage());
        }


    }

}