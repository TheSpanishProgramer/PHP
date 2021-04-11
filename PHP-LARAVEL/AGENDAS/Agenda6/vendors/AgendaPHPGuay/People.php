<?php
namespace AgendaPHPGuay;
/**
 * People
 * 
 * Clase sencilla que implementa los métodos CRUD sobre un archivo CSV de 
 * personas con el siguiente formato:
 * 
 *      name,surname,email
 *      Marta,González,marta@hotmail.com
 *      Luis,Martín,luis@gmail.com
 *      Antonio,García,antonio@gmail.com
 *      María,López,maria@tuweb.com
 * 
 * La clave primara de estos datos es el campo email.
 * 
 * Esta clase pertenece al curso de programación PHP guay. Los objetivos son 
 * practicar Programación Orientada a Objetos y gestión de archivos CSV.
 *
 * @author Jordi Bassagañas <info@programarivm.com>
 * @copyright 2014 Jordi Bassagañas
 * @link http://programarivm.com
 */
class People
{
    /**
     * @var People Instancia Singleton
     */
    protected static $instance;
    /**
     * @var stdClass Representación del archivo CSV en memoria
     */
    protected $csv;
    /**
     * Método Singleton que devuelve la instancia de clase
     * @return People
     */
    static function getInstance($path)
    {
        if (!isset(self::$instance))
        {
            self::$instance = new self($path);            
        }
        return self::$instance;
    }
    /**
     * Método Singleton que impide la clonación del objeto
     */
    function __clone() {
        trigger_error( "Cannot clone instance of Singleton pattern.", E_USER_ERROR );
    }
    /**
     * Constructor que inicializa el CSV en memoria
     * @param string $path
     */
    protected function __construct($path)
    {        
        $this->csv = new \stdClass;
        $this->csv->path = $path;
        // Cargamos la cabecera y las personas del archivo CSV en memoria
        $fp = @fopen($this->csv->path, 'r') or die('The file cannot be opened');
        while (($row = fgetcsv($fp, 1024, ",")) !== false)
        {
            !isset($this->csv->header) 
                ? $this->csv->header = $row 
                : $this->csv->people[] = array_combine($this->csv->header, $row);
        }
        fclose($fp);   
    }
    /**
     * Devuelve el CSV cargado en memoria
     * @return array
     */
    function getCsv()
    {
        return $this->csv;
    }
    /**
     * Añade un nuevo contacto
     * @param array $person
     */
    function add(array $person)
    {        
        $this->csv->people[] = $person;
        return $this;
    }
    /**
     * Actualiza los datos de un contacto
     * @param array $person
     */
    function update(array $person)
    {        
        foreach($this->csv->people as $key => &$value)
        {
            if($value['email'] == $person['email'])
            {
                $value = $person;
                break;
            }
        }
        return $this;
    }
    /**
     * Borra un contacto
     * @param string $email
     */
    function delete($email)
    {
        foreach($this->csv->people as $key => &$value)
        {
            if($value['email'] == $email)
            {
                unset($this->csv->people[$key]);
                break;
            }
        }
        return $this;
    }
    /**
     * Escribe en el archivo CSV los datos cargados en memoria
     */
    function write()
    {
        if(!isset($this->csv->header)) 
            die('Write a CSV header in the file before adding a new contact');
        $fp = @fopen($this->csv->path, 'w') or die('The file cannot be opened');
        fputcsv($fp, $this->csv->header);
        foreach($this->csv->people as $person)
        {
            fputcsv($fp, $person);
        }
        fclose($fp);
    }
}