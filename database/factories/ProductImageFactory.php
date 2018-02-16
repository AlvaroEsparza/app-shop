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
            "image" => $faker->imageUrl(250,250),
            "product_id" => $faker->numberBetween(1 , 100)
    ];
});
