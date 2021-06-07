<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\ActividadOcio;
use Faker\Generator as Faker;

$factory->define(ActividadOcio::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
