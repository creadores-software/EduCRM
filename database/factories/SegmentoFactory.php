<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\User;
use App\Models\Contactos\Segmento;
use Faker\Generator as Faker;

$factory->define(Segmento::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(100),
        'descripcion' => $faker->realText(255),
        'filtros' => function() use($faker) {
            return [
                ['campo'=> $faker->word, 'valor'=>$faker->word]
            ];
        },
        'global' => $faker->boolean,
        'usuario_id' => $faker->numberBetween(1,User::count()),
    ];
});
