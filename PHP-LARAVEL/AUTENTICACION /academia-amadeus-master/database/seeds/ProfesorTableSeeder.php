<?php

use Illuminate\Database\Seeder;

class ProfesorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profesores')->insert([
            'cedula' => '20.235.735',
            'nombre' => 'Georgue',
            'apellido' => 'Guevara',
            'fecha_nacimiento' => '1992/05/21',
            'sexo' => 'm',
            'correo_electronico' => 'gp1234@gmail.com',
            'numero_telefonico' => '0424-955-4545'
        ]);
    }
}
