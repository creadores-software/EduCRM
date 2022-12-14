<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\NivelAcademico;
use App\Models\Formaciones\NivelFormacion;
use Faker\Generator as Faker;

$factory->define(NivelFormacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(100),
        'nivel_academico_id' => $faker->numberBetween(1,NivelAcademico::count()),
    ];
});
