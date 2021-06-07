<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Religion;
use Faker\Generator as Faker;

$factory->define(Religion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
