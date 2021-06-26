<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PreferenciaCampoEducacion;
use App\Models\Formaciones\CampoEducacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaCampoEducacion::class, function (Faker $faker) {

    return [
        'campo_educacion_id' => $faker->numberBetween(1,CampoEducacion::count()),
        'informacion_relacional_id' => $faker->numberBetween(1,InformacionRelacional::count()),
    ];
});
