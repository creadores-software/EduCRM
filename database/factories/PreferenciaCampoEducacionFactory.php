<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\PreferenciaCampoEducacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaCampoEducacion::class, function (Faker $faker) {

    return [
        'campo_educacion_id' => $faker->randomDigitNotNull,
        'informacion_relacional_id' => $faker->randomDigitNotNull
    ];
});
