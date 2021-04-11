<?php

use App\Company;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companies = Company::all();

        foreach ($companies as $company) {
            factory(App\User::class, 1)->create(['company_id' => $company->id]);
        }
    }
}
