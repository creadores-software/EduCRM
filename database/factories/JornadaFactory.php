<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Jornada;
use Faker\Generator as Faker;

$factory->define(Jornada::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
