<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\BuyerPersona;
use Faker\Generator as Faker;

$factory->define(BuyerPersona::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->text
    ];
});
