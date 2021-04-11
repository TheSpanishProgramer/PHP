<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $category = new Category();
        $category->name = 'Primaria';
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'ESO';
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Bachiller';
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'PAU';
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Universidad';
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        // PRIMARIA
        $category = new Category();
        $category->name = 'Primero de primaria';
        $category->category_id = 1;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Segundo de primaria';
        $category->category_id = 1;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Tercero de primaria';
        $category->category_id = 1;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Cuarto de primaria';
        $category->category_id = 1;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Quinto de primaria';
        $category->category_id = 1;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Sexto de primaria';
        $category->category_id = 1;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        // ESO
        $category = new Category();
        $category->name = 'Primero de ESO';
        $category->category_id = 2;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Segundo de ESO';
        $category->category_id = 2;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Tercero de ESO';
        $category->category_id = 2;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Cuarto de ESO';
        $category->category_id = 2;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        // BACHILLER
        $category = new Category();
        $category->name = 'Primero de bachiller';
        $category->category_id = 3;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Segundo de bachiller';
        $category->category_id = 3;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        // UNIVERSIDAD
        $category = new Category();
        $category->name = 'Primero de carrera';
        $category->category_id = 5;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Segundo de carrera';
        $category->category_id = 5;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Tercero de carrera';
        $category->category_id = 5;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

        $category = new Category();
        $category->name = 'Cuarto de carrera';
        $category->category_id = 5;
        $category->save();
        $category->slug = str_slug($category->name) . '-' . $category->id;
        $category->save();

    }
}
