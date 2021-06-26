<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PreferenciaActividadOcio;
use App\Models\Parametros\ActividadOcio;
use Faker\Generator as Faker;

$factory->define(PreferenciaActividadOcio::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => $faker->numberBetween(1,InformacionRelacional::count()),
        'actividad_ocio_id' => $faker->numberBetween(1,ActividadOcio::count()),
    ];
});
