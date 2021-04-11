<?php

use Illuminate\Database\Seeder;

class RepresentanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('representantes')->insert([
            'cedula' => '9.947.861',
            'nombre' => 'Yumirva',
            'apellido' => 'Mares',
            'direccion' => 'Puerto Ordaz',
           	'telefono_casa' => '0424-942-6288',
           	'telefono_celular' => '0424-942-6288',
           	'telefono_trabajo' => '0424-942-6288',
            'correo_electronico' => 'hectorlarez1@gmail.com',
            'profesion' => 'Licensiada en Contaduria',
            'empresa' => 'Mercantil Banco'
        ]);
    }
}