<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\TipoCampania;
use Faker\Generator as Faker;

$factory->define(TipoCampania::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
        'descripcion' => $faker->unique()->realText(255),
    ];
});
