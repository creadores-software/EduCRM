<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Personalidad;
use Faker\Generator as Faker;

$factory->define(Personalidad::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
