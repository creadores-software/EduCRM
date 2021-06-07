<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Raza;
use Faker\Generator as Faker;

$factory->define(Raza::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
