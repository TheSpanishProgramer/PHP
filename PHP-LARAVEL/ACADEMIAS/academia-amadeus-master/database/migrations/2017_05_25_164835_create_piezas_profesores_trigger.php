<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezasProfesoresTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("       
            CREATE TRIGGER piezas_profesores_trigger
                BEFORE INSERT ON piezas_profesores
                FOR EACH ROW
                BEGIN
                    IF (SELECT id_pieza FROM piezas_profesores WHERE 
                        id_pieza = NEW.id_pieza AND 
                        cedula = NEW.cedula)
                    THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Ya el profesor esta participando en esa pieza.';
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
        DB::unprepared("DROP TRIGGER piezas_profesores_trigger");
    }
}
