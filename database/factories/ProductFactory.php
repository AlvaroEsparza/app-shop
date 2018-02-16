<?php

use App\Product;
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
$factory->define(Product::class, function (Faker\Generator $faker) {

/*substr sustituir el último caracter que en este caso es el "." que nos develve la funcion sentence del factory */
    return [
            "name" => substr($faker->sentence(3),0,-1),
            "description" => $faker->sentence(10),
            "long_text" => $faker->text,
            "price" => $faker->randomFloat(2, 5, 150),
            'category_id'=> $faker->numberBetween(1,5)
    ];
});
