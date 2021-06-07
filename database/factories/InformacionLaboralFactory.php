<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionLaboral;
use Faker\Generator as Faker;

$factory->define(InformacionLaboral::class, function (Faker $faker) {

    return [
        'contacto_id' => $faker->randomDigitNotNull,
        'entidad_id' => $faker->randomDigitNotNull,
        'ocupacion_id' => $faker->randomDigitNotNull,
        'area' => $faker->word,
        'funciones' => $faker->word,
        'telefono' => $faker->word,
        'fecha_inicio' => $faker->word,
        'fecha_fin' => $faker->word,
        'vinculado_actualmente' => $faker->word
    ];
});
