<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\EstadoInteraccion;
use Faker\Generator as Faker;

$factory->define(EstadoInteraccion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->word,
        'tipo_estado_color_id' => $faker->randomDigitNotNull
    ];
});
