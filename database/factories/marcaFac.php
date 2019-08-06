<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\marca;
use Faker\Generator as Faker;

$factory->define(marca::class, function (Faker $faker) {
    return [
        "nombre"=>$faker->lastName(),
        "descripcion"=>$faker->sentence(5)
    ];
});
