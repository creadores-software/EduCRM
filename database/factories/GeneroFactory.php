<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Genero;
use Faker\Generator as Faker;

$factory->define(Genero::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
