<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\EstiloVida;
use Faker\Generator as Faker;

$factory->define(EstiloVida::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
