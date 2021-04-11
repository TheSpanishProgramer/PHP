<?php

use App\Contactme;
use Illuminate\Database\Seeder;

class ContactmeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contactme::truncate();

        $contact = new Contactme();
        $contact->name = 'Anónimo1';
        $contact->email = 'anonimo1@gmail.com';
        $contact->message = 'Mensaje sobre la academia1';
        $contact->solved = 0;
        $contact->save();

        $contact = new Contactme();
        $contact->name = 'Anónimo2';
        $contact->email = 'anonimo2@gmail.com';
        $contact->message = 'Mensaje sobre la academia2';
        $contact->solved = 0;
        $contact->save();

        $contact = new Contactme();
        $contact->name = 'Anónimo3';
        $contact->email = 'anonimo3@gmail.com';
        $contact->message = 'Mensaje sobre la academia3';
        $contact->solved = 0;
        $contact->save();

        $contact = new Contactme();
        $contact->name = 'Anónimo4';
        $contact->email = 'anonimo4@gmail.com';
        $contact->message = 'Mensaje sobre la academia4';
        $contact->solved = 1;
        $contact->save();

        $contact = new Contactme();
        $contact->name = 'Anónimo5';
        $contact->email = 'anonimo5@gmail.com';
        $contact->message = 'Mensaje sobre la academia5';
        $contact->solved = 1;
        $contact->save();
    }
}
