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
    $inicio= new Carbon();
    $fin=Carbon::createFromFormat('Y-m-d H:i:s', $inicio)->addMinutes($faker->numberBetween(0,5));
    return [
        'fecha_inicio' => $inicio,
        'fecha_fin' => $fin,
        'tipo_interaccion_id' => $faker->numberBetween(1,TipoInteraccion::count()),
        'estado_interaccion_id' => $faker->numberBetween(1,EstadoInteraccion::count()),
        'observacion' => $faker->realText(255),
        'oportunidad_id' => $faker->numberBetween(1,Oportunidad::count()),
        'contacto_id' => null,
        'users_id' => $faker->numberBetween(1,User::count()),
    ];
});
