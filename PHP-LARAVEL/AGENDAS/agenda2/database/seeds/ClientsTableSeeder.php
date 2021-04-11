<?php

use App\Company;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
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
            factory(App\Client::class, 2)->create(['company_id' => $company->id]);
        }
    }
}
