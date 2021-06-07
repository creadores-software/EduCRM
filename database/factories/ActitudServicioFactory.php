<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\ActitudServicio;
use Faker\Generator as Faker;

$factory->define(ActitudServicio::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45)
    ];
});
