<?php

use Illuminate\Database\Seeder;

class HorarioProfesorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horarios_profesores')->insert([
            'id_horario' => '1',
            'cedula' => '20.235.735'
        ]);

        DB::table('horarios_profesores')->insert([
            'id_horario' => '2',
            'cedula' => '20.235.735'
        ]);

        DB::table('horarios_profesores')->insert([
            'id_horario' => '3',
            'cedula' => '20.235.735'
        ]);

        /* Testing duplicated
		DB::table('horarios_profesores')->insert([
            'id_horario' => '1',
            'cedula' => '20.235.735'
        ]);
        */

        /* TODO. Probar conflictos de horario en seccion y en clase
        particular.

        */
    }
}
