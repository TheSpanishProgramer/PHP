<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiezasTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("       
            CREATE TRIGGER piezas_trigger
                BEFORE INSERT ON piezas
                FOR EACH ROW
                BEGIN
                    IF (SELECT id_concierto FROM piezas WHERE 
                        id_concierto = NEW.id_concierto AND 
                        id_tema = NEW.id_tema AND 
                        cedula_director = NEW.cedula_director)
                    THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Ya existe una pieza con ese tema en el concierto.';
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
        DB::unprepared("DROP TRIGGER piezas_trigger");
    }
}
