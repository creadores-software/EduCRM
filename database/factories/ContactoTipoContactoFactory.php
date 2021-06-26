<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Contacto;
use App\Models\Contactos\ContactoTipoContacto;
use App\Models\Parametros\TipoContacto;
use Faker\Generator as Faker;

$factory->define(ContactoTipoContacto::class, function (Faker $faker) {

    return [
        'contacto_id' => $faker->numberBetween(1,2),
        'tipo_contacto_id' => $faker->numberBetween(1,TipoContacto::count()),
    ];
});
