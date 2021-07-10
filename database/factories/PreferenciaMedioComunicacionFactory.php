<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PreferenciaMedioComunicacion;
use App\Models\Parametros\MedioComunicacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaMedioComunicacion::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => $faker->numberBetween(1,InformacionRelacional::count()),
        'medio_comunicacion_id' => $faker->numberBetween(1,MedioComunicacion::count()),
    ];
});
