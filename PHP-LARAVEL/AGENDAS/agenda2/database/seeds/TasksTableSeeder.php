<?php

use App\Client;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
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
            factory(App\Task::class, 5)->create([
                'company_id' => $client->company_id,
                'client_id' => $client->id
            ]);
        }
    }
}
