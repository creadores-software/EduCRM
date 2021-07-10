<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\Ocupacion;
use App\Models\Entidades\TipoOcupacion;
use Faker\Generator as Faker;

$factory->define(Ocupacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(150),
        'tipo_ocupacion_id' => $faker->numberBetween(1,TipoOcupacion::count()),
    ];
});
