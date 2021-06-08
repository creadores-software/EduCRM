<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Formacion;
use App\Models\Formaciones\FormacionBuyerPersona;
use App\Models\Parametros\BuyerPersona;
//Requerido para creación recursiva hasta entidad.
use App\Models\Entidades\ActividadEconomica;
use Faker\Generator as Faker;

$factory->define(FormacionBuyerPersona::class, function (Faker $faker) {

    return [
        'formacion_id' => function () {
            return factory(Formacion::class)->create()->id;
        },
        'buyer_persona_id' => function () {
            return factory(BuyerPersona::class)->create()->id;
        },
    ];
});
