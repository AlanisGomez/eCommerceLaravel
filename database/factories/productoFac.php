<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\producto;
use App\Categoria;
use App\Marca;
use Faker\Generator as Faker;

$factory->define(producto::class, function (Faker $faker) {

    $file = '#';
    $categoria = Categoria::all()->random();
    switch ($categoria->nombre) {
      case 'Mujer':
      $path_to_files = 'public/images/mujer/';
      $files = array_diff(scandir($path_to_files), array('.', '..'));
      $file = 'images/mujer/' . $files[array_rand($files)];
        break;
      case 'Hombre':
        $path_to_files = 'public/images/hombre/';
        $files = array_diff(scandir($path_to_files), array('.', '..'));
        $file = 'images/hombre/' . $files[array_rand($files)];
        break;
      case 'Niños':
        $path_to_files = 'public/images/ninios/';
        $files = array_diff(scandir($path_to_files), array('.', '..'));
        $file = 'images/ninios/' . $files[array_rand($files)];
        break;
    }

    return [
      "nombre"        => $faker->sentence(3),
      "descripcion"   => $faker->sentence(5),
      "precio"        => $faker->randomFloat(2,250,1999),
      "stock"         => $faker->randomNumber(2),
      "categoria_id"  => $categoria->id,
      "marca_id"      => Marca::all()->random()->id,
      "imagen"        => $file
      //  $faker->randomElement(['seller', 'buyer'])
    ];
});
