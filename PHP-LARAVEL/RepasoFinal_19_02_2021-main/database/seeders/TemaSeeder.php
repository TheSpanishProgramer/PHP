<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tema;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tema::create([
            'nombre'=>"Aventura",
            'descripcion'=>"Libros de aventuras para todaas las edades o quizás no"
        ]);
        Tema::create([
            'nombre'=>"Poesia",
            'descripcion'=>"Libros de poesias para todas las edades esta vez si"
        ]);
        Tema::create([
            'nombre'=>"Ensayo",
            'descripcion'=>"Libros de ensayo para todas las edades"
        ]);
        Tema::create([
            'nombre'=>"Drama",
            'descripcion'=>"Libros de drama para sufrir si medida"
        ]);
        Tema::create([
            'nombre'=>"Matemáticas",
            'descripcion'=>"Manuales de matemáticas de todos los niveles"
        ]);
    }
}
