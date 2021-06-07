<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\EstatusLealtad;
use Faker\Generator as Faker;

$factory->define(EstatusLealtad::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
