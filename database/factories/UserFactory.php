<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\user;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(user::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'fullname'=>$faker->name,
        'tel' => $faker->tollFreePhoneNumber,
        'image'=>'link to image here',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'description' => $faker->sentence(20),
        'solde'=>$faker->biasedNumberBetween($min=10, $max=20,$fct='sqrt'),
        'paypal' => $faker->safeEmail,
        'role_id' => 1
        //'email_verified_at' => now(),
    ];
});