<?php
namespace Src\Internacional;

class Articulo {
    public $nombre;
    public function decirNamepace() {
        echo "<p>".__NAMESPACE__."</p>";
    }
}