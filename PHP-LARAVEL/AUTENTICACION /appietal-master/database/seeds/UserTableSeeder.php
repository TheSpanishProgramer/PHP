<?php

use Illuminate\Database\Seeder;
use AppIetal\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('users')->truncate(); //elimina la bd cada vez que realizo el seed



        factory(AppIetal\User::class)->create([
            'nombre'  =>'Administrador',
            'email'   =>'admin@ietal.com',
            'tipo'    =>'admin',
            'password'=>bcrypt('secret')
            ]);





    }
}
