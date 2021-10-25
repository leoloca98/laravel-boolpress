<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories_names = ['HTML', 'JS', 'CSS', 'PHP', 'VueJS', 'Laravel'];

        foreach ($categories_names as $name) {
            $category = new Category();

            $category->name = $name;
            $category->slug = Str::slug($name, '-');

            $category->save();
        }
    }
}
