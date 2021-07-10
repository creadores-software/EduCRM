<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\TipoInteraccion;
use Faker\Generator as Faker;

$factory->define(TipoInteraccion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
    ];
});
