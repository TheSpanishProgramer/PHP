<?php

use Illuminate\Database\Seeder;

class PiezaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('piezas')->insert([
            'id_concierto' => '1',
            'id_tema' => '1',
            'cedula_director' => '20.235.735'
        ]);

        /* Testing trigger
        DB::table('piezas')->insert([
            'id_concierto' => '1',
            'id_tema' => '1',
            'cedula_director' => '20.235.735'
        ]);
        */
    }
}
