<?php

use Illuminate\Database\Seeder;
use App\Vendedor;
class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('vendedors')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        factory(Vendedor::class, 20)->create();
    }
}
