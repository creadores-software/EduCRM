<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Generacion;
use Faker\Generator as Faker;

$factory->define(Generacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
