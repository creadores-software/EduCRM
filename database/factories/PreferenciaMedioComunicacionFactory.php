<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PreferenciaMedioComunicacion;
use App\Models\Parametros\MedioComunicacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaMedioComunicacion::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => function () {
            return factory(InformacionRelacional::class)->create()->id;
        },
        'medio_comunicacion_id' => function () {
            return factory(MedioComunicacion::class)->create()->id;
        },
    ];
});
