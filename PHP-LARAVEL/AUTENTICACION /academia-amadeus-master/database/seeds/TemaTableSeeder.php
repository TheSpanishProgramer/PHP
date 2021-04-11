<?php

use Illuminate\Database\Seeder;

class TemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temas')->insert([
            'nombre' => 'Despair',
            'autor'  => 'Kevin McLeod'
        ]);
    }
}
