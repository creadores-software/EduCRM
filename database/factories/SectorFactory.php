<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entidades\Sector;
use Faker\Generator as Faker;

$factory->define(Sector::class, function (Faker $faker) {

    return [
        'nombre' => $faker->unique()->realText(45),
    ];
});
