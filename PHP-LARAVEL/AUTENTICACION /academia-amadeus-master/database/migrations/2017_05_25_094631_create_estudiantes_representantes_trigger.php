<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesRepresentantesTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("       
            CREATE TRIGGER estudiantes_representantes_trigger
                BEFORE INSERT ON estudiantes_representantes
                FOR EACH ROW
                BEGIN
                    IF (SELECT cedula_estudiante FROM estudiantes_representantes WHERE cedula_estudiante = NEW.cedula_estudiante AND cedula_representante = NEW.cedula_representante)
                    THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Ya existe una relacion entre ese estudiante y representante.';
                    END IF;
                END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER estudiantes_representantes_trigger");
    }
}
