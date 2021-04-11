<?php

use App\Articulo;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articulo::create([
            'nombre' => 'Disco duro Seagate',
            'categoria' => 'Electrónica',
            'precio' => 40,
            'stock' => 80,
            'imagen' => 'img/articulos/default.jpg'
        ]);

        Articulo::create([
            'nombre' => 'Disco SSD Kingston',
            'categoria' => 'Electrónica',
            'precio' => 60,
            'stock' => 120,
            'imagen' => 'img/articulos/default.jpg'
        ]);

        Articulo::create([
            'nombre' => 'Sofá',
            'categoria' => 'Hogar',
            'precio' => 219.99,
            'stock' => 20,
            'imagen' => 'img/articulos/default.jpg'
        ]);

        Articulo::create([
            'nombre' => 'Secador de pelo',
            'categoria' => 'Hogar',
            'precio' => 55,
            'stock' => 45,
            'imagen' => 'img/articulos/default.jpg'
        ]);

        Articulo::create([
            'nombre' => 'Llavero Deadpool',
            'categoria' => 'Bazar',
            'precio' => 15,
            'stock' => 60,
            'imagen' => 'img/articulos/default.jpg'
        ]);
    }
}
