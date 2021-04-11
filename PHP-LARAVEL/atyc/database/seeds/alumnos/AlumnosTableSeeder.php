<?php

use Illuminate\Database\Seeder;

class AlumnosTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
    {
        $this->updateTableToMigrate();

        $this->insert();

        $this->alterSequence();
    }

  /**
   * Corre unos updates para que los campos matcheen al momento del insert.
   *
   * @return void
   */
    public function updateTableToMigrate()
    {
        \DB::connection('g_plannacer')->statement('update g_plannacer.alumnos 
          set trabaja_en = upper(trabaja_en)');
        \DB::connection('g_plannacer')->statement('update g_plannacer.alumnos 
          set funcion = upper(funcion)');
        \DB::connection('g_plannacer')->statement('update g_plannacer.alumnos 
          set tipo_convenio = upper(tipo_convenio)');
        \DB::connection('g_plannacer')->statement("update g_plannacer.alumnos 
          set tipo_convenio = '' where tipo_convenio is null");
    }

  /**
   * Migro los datos desde la otra tabla.
   *
   * @return void
   */
    public function insert()
    {
        \DB::statement("INSERT INTO alumnos.alumnos
     (id_alumno,nombres,apellidos,id_tipo_documento,nro_doc,email,cel,tel,localidad,id_trabajo,id_funcion,id_provincia,
     id_convenio,establecimiento1,establecimiento2,organismo1,organismo2)
     (SELECT
     sub.id as id_alumno, 
     sub.nombres,
     sub.apellidos,
     T.id_tipo_documento,
     sub.nro_doc,
     sub.email,
     sub.cel,
     sub.tel,
     sub.localidad,
     TR.id_trabajo,
     F.id_funcion,
     sub.provincia as id_provincia,
     C.id_convenio,
     sub.establecimiento1,
     sub.establecimiento2,
     upper(sub.organismo1),
     sub.organismo2
     FROM dblink('dbname=elearning port=5432 
     host=192.6.0.66 user=postgres password=BernardoCafe008',
     'SELECT * FROM g_plannacer.alumnos')
     AS sub(id integer,
     nombres character varying(100),
     apellidos character varying(100),
     tipo_doc character varying(20),
     nro_doc character varying(20),
     email character varying(50),
     cel character varying(20),
     tel character varying(20),
     localidad character varying(300),
     trabaja_en character varying(300),
     funcion character varying(300),
     provincia integer,
     tipo_convenio character varying(100),
     establecimiento1 character varying(300),
     establecimiento2 character varying(300),
     organismo1 character varying(50),
     organismo2 character varying(300)) 
     INNER JOIN sistema.tipos_documentos T ON T.nombre = sub.tipo_doc 
     INNER JOIN alumnos.trabajos TR ON TR.nombre = sub.trabaja_en 
     INNER JOIN alumnos.funciones F ON F.nombre = sub.funcion 
     INNER JOIN alumnos.convenios C ON C.nombre = sub.tipo_convenio)");
    }

  /**
   * Busco el ultimo id de la tabla migrada para setear start en la sequence de la nueva tabla.
   *
   * @return void
   */
    public function alterSequence()
    {
        $max_id = \DB::connection('g_plannacer')->select("SELECT max(id) FROM g_plannacer.alumnos");
        $max_id = $max_id[0]->max;
        $max_id++;

        \DB::statement("ALTER SEQUENCE alumnos.alumnos_id_alumno_seq START ".strval($max_id));
        \DB::statement("ALTER SEQUENCE alumnos.alumnos_id_alumno_seq RESTART");
    }
}
