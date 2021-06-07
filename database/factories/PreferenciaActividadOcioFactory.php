<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\PreferenciaActividadOcio;
use Faker\Generator as Faker;

$factory->define(PreferenciaActividadOcio::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => $faker->randomDigitNotNull,
        'actividad_ocio_id' => $faker->randomDigitNotNull
    ];
});
