<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\Sisben;
use Faker\Generator as Faker;

$factory->define(Sisben::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
    ];
});
