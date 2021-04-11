<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Admin
        User::create([
        	'name' => 'Walter Izaguirre',
        	'email' => 'wizaguirrel@gmail.com',
        	'password' => bcrypt('123456'),
        	'role' => 0
        ]);

    	// Suppport
        User::create([
        	'name' => 'Juan Perez',
        	'email' => 'jperez@gmail.com',
        	'password' => bcrypt('123456'),
        	'role' => 1
        ]);

    	// Client
        User::create([
        	'name' => 'María Gomez',
        	'email' => 'mgomez@gmail.com',
        	'password' => bcrypt('123456'),
        	'role' => 2
        ]);             
    }
}
