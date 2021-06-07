<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\PersonaBuyerPersona;
use Faker\Generator as Faker;

$factory->define(PersonaBuyerPersona::class, function (Faker $faker) {

    return [
        'buyer_persona_id' => $faker->randomDigitNotNull,
        'informacion_relacional_id' => $faker->randomDigitNotNull
    ];
});
