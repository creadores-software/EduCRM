<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Origen;
use Faker\Generator as Faker;

$factory->define(Origen::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
