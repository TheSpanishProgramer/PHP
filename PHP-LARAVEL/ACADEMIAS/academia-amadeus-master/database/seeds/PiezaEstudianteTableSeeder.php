<?php

use Illuminate\Database\Seeder;

class PiezaEstudianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('piezas_estudiantes')->insert([
            'id_pieza' => '1',
            'cedula' => '24.890.347',
            'registro' => 'A',
            'instrumento' => 'Piano'
        ]);

        /* Testing
        DB::table('piezas_estudiantes')->insert([
            'id_pieza' => '1',
            'cedula' => '24.890.347',
            'registro' => 'A',
            'instrumento' => 'Piano'
        ]);
        */
    }
}
