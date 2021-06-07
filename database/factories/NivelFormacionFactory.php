<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\NivelAcademico;
use App\Models\Formaciones\NivelFormacion;
use Faker\Generator as Faker;

$factory->define(NivelFormacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(100),
        'nivel_academico_id' => function () {
            return factory(NivelAcademico::class)->create()->id;
        },
    ];
});
