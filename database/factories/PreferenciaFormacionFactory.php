<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PreferenciaFormacion;
use App\Models\Formaciones\Formacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaFormacion::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => $faker->numberBetween(1,InformacionRelacional::count()),
        'formacion_id' => $faker->numberBetween(1,Formacion::count()),
    ];
});
