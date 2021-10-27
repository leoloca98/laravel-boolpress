<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                CategoriesTableSeeder::class,
                UsersTableSeeder::class,
                TagsTableSeeder::class,
                PostsTableSeeder::class                 //E' la relazione più debole, quindi sta all'ulitmo
            ]
        );
    }
}
