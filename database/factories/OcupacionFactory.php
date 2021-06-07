<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\Ocupacion;
use Faker\Generator as Faker;

$factory->define(Ocupacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'tipo_ocupacion_id' => $faker->randomDigitNotNull
    ];
});
