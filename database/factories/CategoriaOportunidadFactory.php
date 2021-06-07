<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\CategoriaOportunidad;
use Faker\Generator as Faker;

$factory->define(CategoriaOportunidad::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->word,
        'interes_minimo' => $faker->randomDigitNotNull,
        'interes_maximo' => $faker->randomDigitNotNull,
        'capacidad_minima' => $faker->randomDigitNotNull,
        'capacidad_maxima' => $faker->randomDigitNotNull,
        'color_hexadecimal' => $faker->word
    ];
});
