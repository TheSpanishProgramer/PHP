<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath' => 'http://todofondos.com/bin/fondos/01/46/02d.jpg',
        	'title' => 'Pescaditos',
        	'description' => 'Super cool - at least a child',
        	'price' => 12,
        	]);
        $product->save();

         $product = new \App\Product([
        	'imagePath' => 'http://todofondos.com/bin/fondos/01/46/02d.jpg',
        	'title' => 'Pescaditos',
        	'description' => 'Super cool - at least a child',
        	'price' => 12,
        	]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://todofondos.com/bin/fondos/01/46/02d.jpg',
        	'title' => 'Pescaditos',
        	'description' => 'Super cool - at least a child',
        	'price' => 12,
        	]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://todofondos.com/bin/fondos/01/46/02d.jpg',
        	'title' => 'Pescaditos',
        	'description' => 'Super cool - at least a child',
        	'price' => 12,
        	]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://todofondos.com/bin/fondos/01/46/02d.jpg',
        	'title' => 'Pescaditos',
        	'description' => 'Super cool - at least a child',
        	'price' => 12,
        	]);
        $product->save();

        $product = new \App\Product([
        	'imagePath' => 'http://todofondos.com/bin/fondos/01/46/02d.jpg',
        	'title' => 'Pescaditos',
        	'description' => 'Super cool - at least a child',
        	'price' => 12,
        	]);
        $product->save();

    }

}
