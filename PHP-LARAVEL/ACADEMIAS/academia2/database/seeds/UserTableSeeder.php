<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        User::create(['name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('admin123'),
                    'rol_id' => '1']);

        User::create(['name' => 'user',
                    'email' => 'user@gmail.com',
                    'password' => bcrypt('user123'),
                    'rol_id' => '2']);


         for ($i=0; $i < 50 ; $i++) {
            
            User::create(['name' => $faker->firstname,
                    'email' => $faker->unique()->email,
                    'password' => bcrypt('secret'),
                    'rol_id' => '2']);

        }

    }
}
