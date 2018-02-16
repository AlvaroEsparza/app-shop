<?php

use App\ProductImage;
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
$factory->define(ProductImage::class, function (Faker\Generator $faker) {

    return [
            "name" => $faker->word,
            "description" => $faker->sentence(10),
            "long_text" => $faker->text,
            "price" => $faker->randomFloat(2, 5, 150)
            //'category_id'
    ];
});
