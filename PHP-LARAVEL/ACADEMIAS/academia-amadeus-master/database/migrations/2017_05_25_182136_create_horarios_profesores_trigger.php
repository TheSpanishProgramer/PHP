<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosProfesoresTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("       
            CREATE TRIGGER horarios_profesores_trigger
                BEFORE INSERT ON horarios_profesores
                FOR EACH ROW
                BEGIN
                    IF (SELECT id_horario FROM horarios_profesores WHERE 
                        id_horario = NEW.id_horario AND 
                        cedula = NEW.cedula)
                    THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Ya el profesor tiene ese horario registrado como disponible.';
                    END IF;
                END;
        ");

        /* TODO. Probar conflictos de horario en seccion y en clase
        particular.*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER horarios_profesores_trigger");
    }
}
