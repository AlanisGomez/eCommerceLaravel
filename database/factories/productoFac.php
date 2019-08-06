<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\producto;
use App\Categoria;
use App\Marca;
use Faker\Generator as Faker;

$factory->define(producto::class, function (Faker $faker) {
    return [
      "nombre"        =>$faker->sentence(3),
      "descripcion"   =>$faker->sentence(5),
      "precio"        =>$faker->randomFloat(2,250,9999),
      "stock"         =>$faker->randomNumber(2),
      "categoria_id"  => Categoria::all()->random()->id,
      "marca_id"      => Marca::all()->random()->id,
      "imagen"        => $faker->imageUrl(500, 500, 'fashion')
      //  $faker->randomElement(['seller', 'buyer'])
    ];
});
