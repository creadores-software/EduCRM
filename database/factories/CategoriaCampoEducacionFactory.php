<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\CategoriaCampoEducacion;
use Faker\Generator as Faker;

$factory->define(CategoriaCampoEducacion::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(150)
    ];
});
