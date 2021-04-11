<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('categorias')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        
        Categoria::create([
            'nombre'=>'Hogar'
        ]);
        Categoria::create([
            'nombre'=>'Electrónica'
        ]);
        Categoria::create([
            'nombre'=>'Deporte'
        ]);
        Categoria::create([
            'nombre'=>'Bazár'
        ]);
        Categoria::create([
            'nombre'=>'Electricidad'
        ]);
        Categoria::create([
            'nombre'=>'Jardín'
        ]);
    }
}
