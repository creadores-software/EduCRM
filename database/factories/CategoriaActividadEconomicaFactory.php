<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\CategoriaActividadEconomica;
use Faker\Generator as Faker;

$factory->define(CategoriaActividadEconomica::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(150)
    ];
});
