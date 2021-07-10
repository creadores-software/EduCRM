<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Formacion;
use App\Models\Formaciones\FormacionBuyerPersona;
use App\Models\Parametros\BuyerPersona;
//Requerido para creación recursiva hasta entidad.
use App\Models\Entidades\ActividadEconomica;
use Faker\Generator as Faker;

$factory->define(FormacionBuyerPersona::class, function (Faker $faker) {

    return [
        'formacion_id' => $faker->numberBetween(1,Formacion::count()),
        'buyer_persona_id' => $faker->numberBetween(1,BuyerPersona::count()),
    ];
});
