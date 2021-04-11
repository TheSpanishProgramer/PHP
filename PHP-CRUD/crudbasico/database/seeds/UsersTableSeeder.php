<?php

use Illuminate\Database\Seeder;
use \App\Models\Role;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = Role::where('name', 'superadmin')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_certificador = Role::where('name', 'certificador')->first();
        $role_user = Role::where('name', 'user')->first();

        DB::table('users')->insert([
            'name' => 'superadmin',
            'email' => 'superadmin',
            'password' => bcrypt('superadmin'),
        ]);

        $user_admin = User::where('name', '=' ,'superadmin')->first();
        $user_admin->roles()->attach($role_superadmin);

        DB::table('users')->insert([
            'name' => 'example',
            'email' => 'example@gmail.com',
            'password' => bcrypt('1234.abcd'),
        ]);

        $user_admin = User::where('name', '=' ,'Yuki')->first();
        $user_admin->roles()->attach($role_admin);

        DB::table('users')->insert([
            'name' => 'certificador',
            'email' => 'certificador',
            'password' => bcrypt('certificador'),
        ]);

        $user_admin = User::where('name', '=' ,'certificador')->first();
        $user_admin->roles()->attach($role_certificador);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user',
            'password' => bcrypt('user'),
        ]);

        $user_admin = User::where('name', '=' ,'user')->first();
        $user_admin->roles()->attach($role_user);
    }
}
