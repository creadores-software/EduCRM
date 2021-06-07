<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\FrecuenciaUso;
use Faker\Generator as Faker;

$factory->define(FrecuenciaUso::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45)
    ];
});
