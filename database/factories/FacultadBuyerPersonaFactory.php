<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Facultad;
use App\Models\Formaciones\FacultadBuyerPersona;
use App\Models\Parametros\BuyerPersona;
use Faker\Generator as Faker;

$factory->define(FacultadBuyerPersona::class, function (Faker $faker) {

    return [
        'facultad_id' => function () {
            return factory(Facultad::class)->create()->id;
        },
        'buyer_persona_id' => function () {
            return factory(BuyerPersona::class)->create()->id;
        },
    ];
});
