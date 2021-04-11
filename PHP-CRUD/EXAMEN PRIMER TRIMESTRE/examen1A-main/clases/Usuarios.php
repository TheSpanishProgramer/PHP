<?php
namespace Clases;
require "../vendor/autoload.php";
use Clases\Conexion;
use PDOException;
use PDO;

class Usuarios extends Conexion{
    private $id;
    private $nombre;
    private $perfil;
    private $pass;

    public function __construct(){
        parent::__construct();
    }
    public function isOk(){
        $c="select * from usuarios where nombre=:n AND pass=:p";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([':n'=>$this->nombre, ':p'=>$this->pass]);
        }catch(PDOException $ex){
            die("Error al compreobar el usuario: ".$ex->getMessage());
        }
        $perfil=$stmt->fetch(PDO::FETCH_OBJ)->perfil;
        return ($perfil!=null) ? $perfil : -1;
        
    }
        
    

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
}