<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\PreferenciaMedioComunicacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaMedioComunicacion::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => $faker->randomDigitNotNull,
        'medio_comunicacion_id' => $faker->randomDigitNotNull
    ];
});
