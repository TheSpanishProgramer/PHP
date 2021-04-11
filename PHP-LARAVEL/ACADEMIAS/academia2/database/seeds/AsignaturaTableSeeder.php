<?php

use Illuminate\Database\Seeder;

use App\Asignatura;

class AsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         Asignatura::create(['name' => 'lengua', 'precio' => '30']);
         Asignatura::create(['name' => 'matematicas', 'precio' => '45']);
         Asignatura::create(['name' => 'historia', 'precio' => '25']);
         Asignatura::create(['name' => 'fisica', 'precio' => '50']);
         Asignatura::create(['name' => 'quimica', 'precio' => '40']);
         Asignatura::create(['name' => 'ingles', 'precio' => '30']);
         Asignatura::create(['name' => 'frances', 'precio' => '30']);
         Asignatura::create(['name' => 'filosofia', 'precio' => '25']);
         Asignatura::create(['name' => 'dibujo tecnico', 'precio' => '45']);
         Asignatura::create(['name' => 'biologia', 'precio' => '35']);
         Asignatura::create(['name' => 'tecnologia', 'precio' => '30']);

         
    }
}
