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
    	 $this->call(RolTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(AsignaturaTableSeeder::class);
         $this->call(ProfesorTableSeeder::class);
         $this->call(ClaseTableSeeder::class);
         $this->call(AlumnoTableSeeder::class);
    }
}
