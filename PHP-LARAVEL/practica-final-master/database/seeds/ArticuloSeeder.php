<?php

use App\Articulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('articulos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Articulo::create([
            'nombre' => 'Ratón',
            'modelo' => 'Razer Mamba elite',
            'precio' => 99.99,
            'stock' => 100,
            'detalles' => 'Sensor óptico avanzado Razer 5G con 16 000 DPI reales
                            Hasta 450 pulgadas por segundo (IPS)/50 G de aceleración
                            Tasa de sondeo (ultrapolling) de 1000 Hz
                            Nueve botones Hyperesponse programables de forma independiente
                            Switches mecánicos Razer™ para ratón con un ciclo de vida de 50 millones de clicks
                            Rueda de desplazamiento táctil especial para juegos
                            Diseño ergonómico para diestros
                            Iluminación Razer Chroma™ con 16,8 millones de colores personalizables
                            Memoria híbrida local y almacenamiento en la nube
                            Compatible con Razer Synapse 3
                            Tamaño aproximado: 125,0 mm/4,92" (largo) X 69,9 mm/2,75" (ancho) X 43,3 mm/1,70" (alto)
                            Peso aproximado (sin cable): 96 g/0,211 lbs
                            Longitud del cable: 2,1 m/6,89 ft
                            Compatible con Xbox One para entrada básica',
            'categoria_id' => 1
        ]);
    }
}
