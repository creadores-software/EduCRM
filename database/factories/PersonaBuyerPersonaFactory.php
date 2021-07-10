<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PersonaBuyerPersona;
use App\Models\Parametros\BuyerPersona;
use Faker\Generator as Faker;

$factory->define(PersonaBuyerPersona::class, function (Faker $faker) {

    return [
        'buyer_persona_id' => $faker->numberBetween(1,BuyerPersona::count()),
        'informacion_relacional_id' => $faker->numberBetween(1,InformacionRelacional::count()),
    ];
});
