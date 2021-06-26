<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Genero;
use App\Models\Parametros\Prefijo;
use Faker\Generator as Faker;

$factory->define(Prefijo::class, function (Faker $faker) {

    return [
        'genero_id' => $faker->numberBetween(1,Genero::count()),
        'nombre' => $faker->unique()->realText(45),
    ];
});
