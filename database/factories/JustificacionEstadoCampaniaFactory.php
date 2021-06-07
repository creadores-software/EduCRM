<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\JustificacionEstadoCampania;
use Faker\Generator as Faker;

$factory->define(JustificacionEstadoCampania::class, function (Faker $faker) {

    return [
        'estado_campania_id' => $faker->randomDigitNotNull,
        'nombre' => $faker->word
    ];
});
