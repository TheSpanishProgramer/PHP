<?php

namespace Ejercicio2\Models;

class Publicacion {

    private $autores;
    private $ano;
    private $editorial;
    private $titulo;
    private $texto;

    public function __construct($autores, $ano, $editorial, $titulo, $texto)
    {
        $this->autores = $autores;
        $this->ano = $ano;
        $this->editorial = $editorial;
        $this->titulo = $titulo;
        $this->texto = $texto;
    }

    function leer()
    {
        return $this->texto;
    }

    function escribir($texto)
    {
        $this->texto = $this->texto . " " . $texto;
    }

    /**
     * @return mixed
     */
    public function getAutores()
    {
        return $this->autores;
    }

    /**
     * @param mixed $autores
     */
    public function setAutores($autores): void
    {
        $this->autores = $autores;
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param mixed $ano
     */
    public function setAno($ano): void
    {
        $this->ano = $ano;
    }

    /**
     * @return mixed
     */
    public function getEditorial()
    {
        return $this->editorial;
    }

    /**
     * @param mixed $editorial
     */
    public function setEditorial($editorial): void
    {
        $this->editorial = $editorial;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param mixed $texto
     */
    public function setTexto($texto): void
    {
        $this->texto = $texto;
    }





}