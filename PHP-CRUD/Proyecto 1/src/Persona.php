<?php
class Persona {
    public static $cont;
    public $nombre;
    public $apellidos;
    protected $edad;

    public function __construct() {
        self::incrementarPersonas();
        $n=func_num_args();
        switch ($n) {
            case 3:
                $this->inicio(func_get_args());
                break;
            case 2:
                $this->inicio1(func_get_args());
                break;
            
            default:
                # code...
                break;
        }
    }
    //-------------------------------------------
    public function inicio($arg) {
        $this->nombre = $arg[0];
        $this->apellidos = $arg[1];
        $this ->edad = $arg[2];
    }
    public function inicio1($arg) {
        $this->nombre = $arg[0];
        $this->apellidos = $arg[1];
    }
    //-------------------------------------------
    public function __toString(): String {
        return "<pre>{$this->apellidos}, {$this->nombre}, Edad: {$this->edad}</pre>";
    }
    //-------------------------------------------
    public static function incrementarPersonas() {
        self::$cont++;
    }
}