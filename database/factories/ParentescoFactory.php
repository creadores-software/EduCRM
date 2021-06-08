<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\Parentesco;
use App\Models\Parametros\TipoParentesco;
use Faker\Generator as Faker;

$factory->define(Parentesco::class, function (Faker $faker) {

    return [
        'contacto_origen' => function () {
            return factory(Contacto::class)->create()->id;
        },
        'contacto_destino' => function () {
            return factory(Contacto::class)->create()->id;
        },
        'tipo_parentesco_id' => function () {
            return factory(TipoParentesco::class)->create()->id;
        },
        'acudiente' => $faker->boolean
    ];
});
