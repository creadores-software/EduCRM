<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\Segmento;
use Faker\Generator as Faker;

$factory->define(Segmento::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->word,
        'filtros' => $faker->text,
        'global' => $faker->word,
        'usuario_id' => $faker->word
    ];
});
