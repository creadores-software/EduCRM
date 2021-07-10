<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Formaciones\PeriodoAcademico;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(PeriodoAcademico::class, function (Faker $faker) {
    $inicio=Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
    $fin=Carbon::createFromFormat('Y-m-d H:i:s', $inicio)->addMonths(6);
    return [
        'nombre' => $faker->unique()->realText(45),
        'fecha_inicio' => $inicio->format('Y-m-d'),
        'fecha_fin' => $fin->format('Y-m-d')
    ];
});
