<?php
namespace Clases;
require "../vendor/autoload.php";

use PDO;
use PDOException;

class Articulos extends Conexion{
    private $id;
    private $nombre;
    private $pvp;
    private $imagen;
    private $stock;

    public function __construct()
    {
        parent::__construct();
    }
    //------------------------------------------------------------------------------------------------------------------
    public function create(){
        $c="insert into articulos(nombre, pvp, stock, imagen) values(:n, :p, :s,  :i)";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':p'=>$this->pvp,
                ':s'=>$this->stock,
                ':i'=>$this->imagen
            ]);
        }catch (PDOException $ex){
            unlink($this->imagen);
            die("Error al crear articulo. ".$ex->getMessage());
            
        }

    }
    public function read(){
        $c="select * from articulos where id=:i";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([':i'=>$this->id]);
        }catch (PDOException $ex){
            die("Error al recuperar el articulos. ".$ex->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_OBJ);

    }
    public function update(){
        $u="update articulos set nombre=:n, imagen=:i, pvp=:p, stock=:s where id=:id";
        $stmt=parent::$conexion->prepare($u);
        $imagen=$this->traerImagen();
        //$imagen=$this->traerImagen();
        try{
            $stmt->execute([
                ':id'=>$this->id, 
                ':n'=>$this->nombre,
                ':p'=>$this->pvp,
                ':s'=>$this->stock,
                ':i'=>$this->imagen
                ]);
        }catch (PDOException $ex){
            die("Error al actualizar el articulo. ".$ex->getMessage());
        }
        if(basename($imagen)!="default.jpg"){
            unlink($imagen);
        }


    }
    public function delete(){
        $i="delete from articulos where id=:i";
        $stmt=parent::$conexion->prepare($i);
        $imagen=$this->traerImagen();
        try{
            $stmt->execute([':i'=>$this->id]);
        }catch (PDOException $ex){
            die("Error al borrar el articulos. ".$ex->getMessage());
        }
        //borro la imagen
        if(basename($imagen)!="default.jpg"){
            unlink($imagen);
        }
    

    }

    public function readAll($p, $t){
        $c="select * from articulos order by nombre, pvp, stock limit $p, $t";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute();
        }catch (PDOException $ex){
            die("Error al recuperar los articulos. ".$ex->getMessage());
        }
        return $stmt;
    }
    //------------------------------------------------------------------------------------------------------------------
    public function totalRegistro(): Int{
        $c="select count(*) as total from articulos";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute();
        }catch (PDOException $ex){
            die("Error al recuperar la cantidad de articulos. ".$ex->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_OBJ)->total;
    }
    //------------------------------------------------------------------------------------------------------------------
    public function traerImagen(){
        $c="select imagen from articulos where id=:i";
        $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([':i'=>$this->id]);
        }catch (PDOException $ex){
            die("Error al recuperar los articulos. ".$ex->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_OBJ)->imagen;
    }
    //-------------------------------------------------------------------------------------------------------------------
    public function existeNombre(){
       // echo $this->id;
       // die("Muerto");
        if(isset($this->id))
            $c="select count(*) as total from articulos where nombre=:n AND id!=$this->id";
        else
            $c="select count(*) as total from articulos where nombre=:n";
        
            $stmt=parent::$conexion->prepare($c);
        try{
            $stmt->execute([':n'=>$this->nombre]);
        }catch (PDOException $ex){
            die("Error al recuperar los articulos. ".$ex->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_OBJ)->total;
    }
    //-------------------------------------------------------------------------------------------------------------------
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $pvp
     */
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

}
