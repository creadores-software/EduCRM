<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Reconocimiento;
use Faker\Generator as Faker;

$factory->define(Reconocimiento::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(150)
    ];
});
