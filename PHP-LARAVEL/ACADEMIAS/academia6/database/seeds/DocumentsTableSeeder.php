<?php

use App\Document;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::truncate();
        Storage::disk('public')->deleteDirectory('documents');
        Storage::disk('public')->makeDirectory('documents');

        factory(Document::class, 10)->create()->each(function ($document) {
            $document->generateSlug();
        });

    }
}
