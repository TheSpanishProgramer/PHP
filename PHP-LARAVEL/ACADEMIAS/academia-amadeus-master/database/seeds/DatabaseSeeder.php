<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UserTableSeeder::class);

    	$this->call(EstudianteTableSeeder::class);
    	$this->call(RepresentanteTableSeeder::class);
    	$this->call(EstudianteRepresentanteTableSeeder::class);

    	$this->call(ConciertoTableSeeder::class);
    	$this->call(TemaTableSeeder::class);
    	$this->call(ProfesorTableSeeder::class);
    	$this->call(PiezaTableSeeder::class);
    	$this->call(PiezaEstudianteTableSeeder::class);
    	$this->call(PiezaProfesorTableSeeder::class);

    	$this->call(HorarioTableSeeder::class);
    	$this->call(HorarioProfesorTableSeeder::class);
    }
}
