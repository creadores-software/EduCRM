<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\MedioComunicacion;
use Faker\Generator as Faker;

$factory->define(MedioComunicacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'es_red_social' => $faker->word
    ];
});
