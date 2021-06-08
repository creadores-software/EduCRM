<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\ContactoTipoContacto;
use App\Models\Parametros\TipoContacto;
use Faker\Generator as Faker;

$factory->define(ContactoTipoContacto::class, function (Faker $faker) {

    return [
        'contacto_id' => function () {
            return factory(Contacto::class)->create()->id;
        },
        'tipo_contacto_id' => function () {
            return factory(TipoContacto::class)->create()->id;
        },
    ];
});
