<?php

use App\Category;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Category::class, function (Faker\Generator $faker) {

    return [
            "name" => ucfirst($faker->word),
            "description" => $faker->sentence(10),
            "image" => $faker->text

    ];
});
