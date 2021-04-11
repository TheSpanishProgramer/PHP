<?php

use Illuminate\Database\Seeder;

class ConciertoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conciertos')->insert([
            'nombre' => 'Coral Amadeus Entertainment',
            'fecha'  => '2017/12/15'
        ]);
    }
}
