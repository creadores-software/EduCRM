<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\TipoParentesco;
use Faker\Generator as Faker;

$factory->define(TipoParentesco::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'tipo_contrario_id' => $faker->randomDigitNotNull
    ];
});
