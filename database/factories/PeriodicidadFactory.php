<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Periodicidad;
use Faker\Generator as Faker;

$factory->define(Periodicidad::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
