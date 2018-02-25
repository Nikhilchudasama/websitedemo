<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'username' => $faker->unique()->username,
        'password' => bcrypt('secret'),
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->phoneNumber,
        'modules' => 1,
        'active' => 1
    ];
});
