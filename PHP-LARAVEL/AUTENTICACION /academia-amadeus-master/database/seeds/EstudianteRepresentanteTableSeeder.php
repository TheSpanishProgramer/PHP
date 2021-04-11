<?php

use Illuminate\Database\Seeder;

class EstudianteRepresentanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudiantes_representantes')->insert([
            'cedula_estudiante' => '24.890.347',
            'cedula_representante' => '9.947.861',
        ]);

        /** Testing trigger
        DB::table('estudiantes_representantes')->insert([
            'cedula_estudiante' => '24.890.347',
            'cedula_representante' => '9.947.861',
        ]);*/
    }
}
