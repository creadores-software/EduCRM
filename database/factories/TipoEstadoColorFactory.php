<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\TipoEstadoColor;
use Faker\Generator as Faker;

$factory->define(TipoEstadoColor::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'color_hexadecimal' => $faker->word
    ];
});
