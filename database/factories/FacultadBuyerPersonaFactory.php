<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\Facultad;
use App\Models\Formaciones\FacultadBuyerPersona;
use App\Models\Parametros\BuyerPersona;
use Faker\Generator as Faker;

$factory->define(FacultadBuyerPersona::class, function (Faker $faker) {

    return [
        'facultad_id' => $faker->numberBetween(1,Facultad::count()),
        'buyer_persona_id' => $faker->numberBetween(1,BuyerPersona::count()),
    ];
});
