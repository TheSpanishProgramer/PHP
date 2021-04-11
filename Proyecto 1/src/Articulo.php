<?php
class articulo {
    public $cod;
    public $nombre;
    public $nom_corto;
    public $pvp;

    public function __construct($c,$n,$nc,$p) {
        $this->cod = $c;
        $this->nombre = $n;
        $this->nom_corto = $nc;
        $this->pvp = $p;
    }
    
    public function __toString() {
        return "<pre>{$this->cod}, {$this->nombre}, {$this->nom_corto}, {$this->pvp}</pre>";
    }
}