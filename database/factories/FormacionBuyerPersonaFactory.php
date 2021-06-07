<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\FormacionBuyerPersona;
use Faker\Generator as Faker;

$factory->define(FormacionBuyerPersona::class, function (Faker $faker) {

    return [
        'formacion_id' => $faker->randomDigitNotNull,
        'buyer_persona_id' => $faker->randomDigitNotNull
    ];
});
