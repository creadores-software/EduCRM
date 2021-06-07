<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\NivelFormacion;
use Faker\Generator as Faker;

$factory->define(NivelFormacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'nivel_academico_id' => $faker->randomDigitNotNull
    ];
});
