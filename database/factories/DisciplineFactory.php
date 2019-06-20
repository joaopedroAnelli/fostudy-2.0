<?php

/** @var Factory $factory */

use App\Discipline;
use Illuminate\Database\Eloquent\Factory;
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

$factory->define(Discipline::class, function (Faker $faker) {
    return [
        'name' => $faker->scho,
        'course_id' => 5,
        'season' => $faker->numberBetween(1, 6)
    ];
});
