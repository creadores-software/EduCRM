<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PreferenciaActividadOcio;
use App\Models\Parametros\ActividadOcio;
use Faker\Generator as Faker;

$factory->define(PreferenciaActividadOcio::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => function () {
            return factory(InformacionRelacional::class)->create()->id;
        },
        'actividad_ocio_id' => function () {
            return factory(ActividadOcio::class)->create()->id;
        },
    ];
});
