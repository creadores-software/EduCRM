<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\EstadoDisposicion;
use Faker\Generator as Faker;

$factory->define(EstadoDisposicion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
