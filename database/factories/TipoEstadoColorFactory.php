<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\TipoEstadoColor;
use Faker\Generator as Faker;

$factory->define(TipoEstadoColor::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
        'color_hexadecimal' => $faker->hexcolor
    ];
});
