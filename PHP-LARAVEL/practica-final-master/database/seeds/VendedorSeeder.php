<?php

use App\Vendedor;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendedor::create([
            'nombre' => 'Manuel',
            'apellidos' => 'Ramos',
            'telefono' => '333666333',
            'email' => 'correo@correo.com',
            'sueldo' => 1650
        ]);

        Vendedor::create([
            'nombre' => 'Ramón',
            'apellidos' => 'López',
            'telefono' => '666333666',
            'email' => 'correo2@correo.com',
            'sueldo' => 1200
        ]);

        Vendedor::create([
            'nombre' => 'Rubén',
            'apellidos' => 'Sáiz',
            'telefono' => '999666999',
            'email' => 'correo3@correo.com',
            'sueldo' => 1625
        ]);

        Vendedor::create([
            'nombre' => 'Jose Manuel',
            'apellidos' => 'Milasi',
            'telefono' => '666666666',
            'email' => 'correo4@correo.com',
            'sueldo' => 1500
        ]);

        Vendedor::create([
            'nombre' => 'Rubén',
            'apellidos' => 'Garcia',
            'telefono' => '111111111',
            'email' => 'correo5@correo.com',
            'sueldo' => 1520.50
        ]);
    }
}
