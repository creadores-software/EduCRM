<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\CampoEducacion;
use App\Models\Formaciones\CategoriaCampoEducacion;
use Faker\Generator as Faker;

$factory->define(CampoEducacion::class, function (Faker $faker) {

    return [
        'categoria_campo_educacion_id' => $faker->numberBetween(1,CategoriaCampoEducacion::count()),
        'nombre' => $faker->unique()->realText(150),
    ];
});
