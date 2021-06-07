<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\PeriodoAcademico;
use Faker\Generator as Faker;

$factory->define(PeriodoAcademico::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'fecha_inicio' => $faker->word,
        'fecha_fin' => $faker->word
    ];
});
