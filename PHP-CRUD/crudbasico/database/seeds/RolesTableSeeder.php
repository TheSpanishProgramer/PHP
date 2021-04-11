<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'user',
            'description' => 'user, puede acceder a la pcu para poder solicitar acceso a los servidores.',
        ]);

        DB::table('roles')->insert([
            'name' => 'certificador',
            'description' => 'certificador, persona que da validez a las solicitudes de los usuarios',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'admin, rol que puede editar las preguntas de certificación',
        ]);

        DB::table('roles')->insert([
            'name' => 'superadmin',
            'description' => 'superadmin, rol que puede ver todo',
        ]);
    }
}
