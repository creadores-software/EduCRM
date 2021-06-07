<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\FacultadBuyerPersona;
use Faker\Generator as Faker;

$factory->define(FacultadBuyerPersona::class, function (Faker $faker) {

    return [
        'facultad_id' => $faker->randomDigitNotNull,
        'buyer_persona_id' => $faker->randomDigitNotNull
    ];
});
