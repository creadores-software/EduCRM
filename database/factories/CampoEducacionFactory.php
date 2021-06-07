<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\CampoEducacion;
use Faker\Generator as Faker;

$factory->define(CampoEducacion::class, function (Faker $faker) {

    return [
        'categoria_campo_educacion_id' => $faker->randomDigitNotNull,
        'nombre' => $faker->word
    ];
});
