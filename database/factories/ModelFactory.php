<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Author;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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
//$value = 'adminadmin';
//$password = Hash::make($value);
//dd($password);

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'Admin Adam',
        'email' => 'admin@admin.com',
        'password' =>  Hash::make('adminadmin')

    ];
});

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->email,
//     ];
// });

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'github'         =>    $faker->name,
        'twitter' => $faker->name,
        'location'=>  $faker->name,
        'latest_article_published'=> $faker->name,
    ];
});
