<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\ActividadEconomica;
use Faker\Generator as Faker;

$factory->define(ActividadEconomica::class, function (Faker $faker) {

    return [
        'categoria_actividad_economica_id' => $faker->randomDigitNotNull,
        'nombre' => $faker->word,
        'es_ies' => $faker->word,
        'es_colegio' => $faker->word
    ];
});
