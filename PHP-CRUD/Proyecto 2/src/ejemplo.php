<?php
namespace Proyecto;

const PI = 3.1415;
function saludo() {
    echo "<pre>Buenos dias!!</pre>";
}

class Prueba {
    public $nombre;
    public function saludoClase($t) {
        echo "<p>Hola: $t, te saludo desde la clase prueba</p>";
    }
}

// namespace otroProyecto