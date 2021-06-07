<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Lugar;
use Faker\Generator as Faker;

$factory->define(Lugar::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'tipo' => $faker->word,
        'padre_id' => $faker->randomDigitNotNull
    ];
});
