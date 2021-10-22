<?php

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;                //D'ora in poi posso chiamarla Faker anzichè chiamarla Generator

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Viene usato per mandare dati al DB

        //* USIAMO UN FAKER PER GENERARE I POST

        for ($i = 0; $i < 50; $i++) {
            $post = new Post();

            $post->title = $faker->text(50);
            $post->content = $faker->paragraphs(2, true);
            $post->slug = Str::slug($post->title, '-');

            $post->save();
        }
    }
}
