<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Parametros\TipoParentesco;
use Faker\Generator as Faker;

$factory->define(TipoParentesco::class, function (Faker $faker) {
    //Se valida solo el primer tipo_parentesco aún sin tipo contrario
    return [
        'nombre' => $faker->unique()->realText(100),
        'tipo_contrario_id' => null
    ];
});
