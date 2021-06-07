<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Modalidad;
use Faker\Generator as Faker;

$factory->define(Modalidad::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
