<?php

use Illuminate\Database\Seeder;

class EstudianteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudiantes')->insert([
            'cedula' => '24.890.347',
            'nombre' => 'Hector',
            'apellido' => 'Larez',
            'lugar_nacimiento' => 'Puerto Ordaz',
            'fecha_nacimiento' => '1995/03/02',
            'sexo' => 'm',
            'instituto' =>'Universidad Nacional Experimental de Guayana',
            'correo_electronico' => 'hectorlarez1@gmail.com',
            'numero_telefonico' => '0424-942-6288',
            'nivel_instituto' => 'Universitario'
        ]);
    }
}