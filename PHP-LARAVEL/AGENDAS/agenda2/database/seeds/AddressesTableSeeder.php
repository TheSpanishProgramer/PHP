<?php

use App\Client;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = Client::all();

        foreach ($clients as $client) {
            factory(App\Address::class, 1)->create([
                'client_id' => $client->id,
                'city_id' => mt_rand(1, 79)
            ]);
        }
    }
}
