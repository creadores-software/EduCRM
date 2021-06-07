<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\ContactoTipoContacto;
use Faker\Generator as Faker;

$factory->define(ContactoTipoContacto::class, function (Faker $faker) {

    return [
        'contacto_id' => $faker->randomDigitNotNull,
        'tipo_contacto_id' => $faker->randomDigitNotNull
    ];
});
