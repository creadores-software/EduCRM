<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\BuyerPersona;
use Faker\Generator as Faker;

$factory->define(BuyerPersona::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
        'descripcion' => $faker->realText(255)
    ];
});
