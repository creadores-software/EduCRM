<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\User;
use App\Models\Campanias\EstadoInteraccion;
use App\Models\Campanias\Interaccion;
use App\Models\Campanias\Oportunidad;
use App\Models\Campanias\TipoInteraccion;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Interaccion::class, function (Faker $faker) {
    $inicio=Carbon::createFromTimeStamp($faker->dateTimeBetween('-2 hours', 'now')->getTimestamp());
    $fin=Carbon::createFromFormat('Y-m-d H:i:s', $inicio)->addMinutes($faker->numberBetween(0,5));
    return [
        'fecha_inicio' => $inicio,
        'fecha_fin' => $fin,
        'tipo_interaccion_id' => function () {
            return factory(TipoInteraccion::class)->create()->id;
        },
        'estado_interaccion_id' => function () {
            return factory(EstadoInteraccion::class)->create()->id;
        },
        'observacion' => $faker->realText(255),
        'oportunidad_id' => function () {
            return factory(Oportunidad::class)->create()->id;
        },
        'contacto_id' => null,
        'users_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
