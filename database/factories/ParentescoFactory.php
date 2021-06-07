<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Parentesco;
use Faker\Generator as Faker;

$factory->define(Parentesco::class, function (Faker $faker) {

    return [
        'contacto_origen' => $faker->randomDigitNotNull,
        'contacto_destino' => $faker->randomDigitNotNull,
        'tipo_parentesco_id' => $faker->randomDigitNotNull,
        'acudiente' => $faker->word
    ];
});
