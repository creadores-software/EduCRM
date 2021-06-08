<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PreferenciaFormacion;
use App\Models\Formaciones\Formacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaFormacion::class, function (Faker $faker) {

    return [
        'informacion_relacional_id' => function () {
            return factory(InformacionRelacional::class)->create()->id;
        },
        'formacion_id' => function () {
            return factory(Formacion::class)->create()->id;
        },
    ];
});
