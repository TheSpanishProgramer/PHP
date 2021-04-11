<?php

use Illuminate\Database\Seeder;
use App\Articulo;
class ArticuloSeeder extends Seeder
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
        DB::table('articulos')->truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
/*
 $table->string('nombre');
            $table->float('pvp', 6,2);
            $table->integer('stock');
            $table->string('imagen')->default('/img/articulos/default.jpg');
            $table->bigInteger('categoria_id')->unsigned()->nullable();
            $table->foreign('categoria_id')
*/
        Articulo::create([
            'nombre'=>'Toalla',
            'pvp'=>'26',
            'stock'=>'25',
            'categoria_id'=>'1'
        ]);
        Articulo::create([
            'nombre'=>'Sofá',
            'pvp'=>'210',
            'stock'=>'21',
            'categoria_id'=>'1'
        ]);
        Articulo::create([
            'nombre'=>'Iphone',
            'pvp'=>'260',
            'stock'=>'5',
            'categoria_id'=>'2'
        ]);
        Articulo::create([
            'nombre'=>'Cascos',
            'pvp'=>'30',
            'stock'=>'15',
            'categoria_id'=>'2'
        ]);
        Articulo::create([
            'nombre'=>'Tenis',
            'pvp'=>'60',
            'stock'=>'50',
            'categoria_id'=>'3'
        ]);
        Articulo::create([
            'nombre'=>'Balón',
            'pvp'=>'60',
            'stock'=>'52',
            'categoria_id'=>'3'
        ]);
        Articulo::create([
            'nombre'=>'Velas',
            'pvp'=>'2',
            'stock'=>'52',
            'categoria_id'=>'4'
        ]);
        Articulo::create([
            'nombre'=>'Alargadera',
            'pvp'=>'20',
            'stock'=>'52',
            'categoria_id'=>'5'
        ]);
        Articulo::create([
            'nombre'=>'Corta cesped',
            'pvp'=>'120',
            'stock'=>'12',
            'categoria_id'=>'6'
        ]);
        Articulo::create([
            'nombre'=>'Cesped Artificial',
            'pvp'=>'12',
            'stock'=>'112',
            'categoria_id'=>'6'
        ]);
    }
}
