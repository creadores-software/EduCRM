<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Contactos\PreferenciaCampoEducacion;
use App\Models\Formaciones\CampoEducacion;
use Faker\Generator as Faker;

$factory->define(PreferenciaCampoEducacion::class, function (Faker $faker) {

    return [
        'campo_educacion_id' => function () {
            return factory(CampoEducacion::class)->create()->id;
        },
        'informacion_relacional_id' => function () {
            return factory(InformacionRelacional::class)->create()->id;
        },
    ];
});
