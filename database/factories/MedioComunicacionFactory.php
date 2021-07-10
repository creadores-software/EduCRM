<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\MedioComunicacion;
use Faker\Generator as Faker;

$factory->define(MedioComunicacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
        'es_red_social' => $faker->boolean
    ];
});
