<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ContactmeTableSeeder::class);
    }
}
