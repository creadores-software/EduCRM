<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\EstadoCampania;
use Faker\Generator as Faker;

$factory->define(EstadoCampania::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->word,
        'tipo_estado_color_id' => $faker->randomDigitNotNull
    ];
});
