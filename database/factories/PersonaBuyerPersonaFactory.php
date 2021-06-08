<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PersonaBuyerPersona;
use App\Models\Parametros\BuyerPersona;
use Faker\Generator as Faker;

$factory->define(PersonaBuyerPersona::class, function (Faker $faker) {

    return [
        'buyer_persona_id' => function () {
            return factory(BuyerPersona::class)->create()->id;
        },
        'informacion_relacional_id' => function () {
            return factory(InformacionRelacional::class)->create()->id;
        },
    ];
});
