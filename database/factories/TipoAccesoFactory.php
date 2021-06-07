<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\TipoAcceso;
use Faker\Generator as Faker;

$factory->define(TipoAcceso::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word
    ];
});
