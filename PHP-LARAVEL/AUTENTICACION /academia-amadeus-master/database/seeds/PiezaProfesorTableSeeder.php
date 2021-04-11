<?php

use Illuminate\Database\Seeder;

class PiezaProfesorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('piezas_profesores')->insert([
            'id_pieza' => '1',
            'cedula' => '20.235.735',
            'instrumento' => 'Piano'
        ]);

        /* Testing
		DB::table('piezas_profesores')->insert([
            'id_pieza' => '1',
            'cedula' => '20.235.735',
            'instrumento' => 'Piano'
        ]);
        */
    }
}
