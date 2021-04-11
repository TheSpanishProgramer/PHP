<?php

    /*Establece una conexion a un servidor de Bases de Datos.
     *Se deben establecer los 4 primeros atributos antes de 
     *conectar.
     *Lanzará una excepcion si no lográ conectar.
     */
    class Conexion {
        
        /* Post: si logra conectar, retorna el objeto PDO
        *        propio de la conexion.
        */ 
        public function get_conexion()
        {
            $user ="root";
            $pass ="";
            $host ="localhost";
            $db ="tutorialpdo";
            
            try  //intento conectar y retorno el objeto PDO.
            {
                $base = new PDO("mysql:host=".$host.
                                ";dbname=".$db,
                                $user,
                                $pass);
                $base->setAttribute(PDO::ATTR_ERRMODE,
                                    PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                
                return $base;
            }
            catch(Exception $e) // lanzo mensaje si no conecta.
            {
                die('Error:'.$e->GetMessage());
            }
            finally // libero la memoria del objeto PDO.
            {
                $base = null;
            }

        }//fin del metodo get_conexion.
    }//fin de la clase Conexion.
?>









