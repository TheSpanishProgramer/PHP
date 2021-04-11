<?php

use Illuminate\Database\Seeder;
use App\Alumno;
class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alumnos')->truncate();//vacia la tabla
        factory(Alumno::class, 20)->create();//creo los registros
    }
}
