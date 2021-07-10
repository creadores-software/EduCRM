<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\CategoriaOportunidad;
use Faker\Generator as Faker;

$factory->define(CategoriaOportunidad::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
        'descripcion' => $faker->realText(255),
        'interes_minimo' => $faker->numberBetween(1,3),
        'interes_maximo' => $faker->numberBetween(4,5),
        'capacidad_minima' => $faker->numberBetween(1,3),
        'capacidad_maxima' => $faker->numberBetween(4,5),
        'color_hexadecimal' => $faker->hexcolor()
    ];
});
