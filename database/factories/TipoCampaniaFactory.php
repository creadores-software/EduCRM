<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Campanias\TipoCampania;
use Faker\Generator as Faker;

$factory->define(TipoCampania::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->word
    ];
});
