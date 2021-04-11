<?php

use App\Alumno;
use App\Modulo;
use Illuminate\Database\Seeder;

class AlumnoModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Alumno::all() as $alumno) {
            //Generamos un numero aleatorio entre 1 y el numero de modulos totales
            $num = rand(0, Modulo::all()->count());
            for ($i = 1; $i <= $num; ++$i) {
                //Generamos una nota de 0 a10 con decimales
                $nota = rand(0, 9) + 1 / rand(1, 10);
                $alumno->modulos()->attach($i, ['nota' => $nota]);
            }
        }
    }
}
