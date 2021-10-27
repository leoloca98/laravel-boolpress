<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Voglio preparare gli utenti
        $user = new User();
        $user->name = 'test.admin';
        $user->email = 'test.admin@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

        for ($i = 0; $i < 9; $i++) {
            $newUser = new User();

            $newUser->name = $faker->userName();
            $newUser->email = $faker->email();
            $newUser->password = bcrypt($faker->word());

            $newUser->save();
        }
    }
}
