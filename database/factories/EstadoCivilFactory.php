<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\EstadoCivil;
use Faker\Generator as Faker;

$factory->define(EstadoCivil::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45)
    ];
});
