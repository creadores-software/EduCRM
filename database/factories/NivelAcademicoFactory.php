<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\NivelAcademico;
use Faker\Generator as Faker;

$factory->define(NivelAcademico::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'es_ies' => $faker->word
    ];
});
