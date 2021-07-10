<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Lugar;
use Faker\Generator as Faker;

$factory->define(Lugar::class, function (Faker $faker) {
    //Solo se prueba el país sin padre
    return [
        'nombre' => $faker->realText(255),
        'tipo' => 'P',
        'padre_id' => null
    ];
});
