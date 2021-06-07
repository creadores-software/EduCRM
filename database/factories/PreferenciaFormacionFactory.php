<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\PreferenciaFormacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaFormacion::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => $faker->randomDigitNotNull,
        'formacion_id' => $faker->randomDigitNotNull
    ];
});
