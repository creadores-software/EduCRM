<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\User;
use App\Models\Campanias\Campania;
use App\Models\Campanias\CategoriaOportunidad;
use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\Oportunidad;
use App\Models\Formaciones\Formacion;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Oportunidad::class, function (Faker $faker) {
    $campania_id=$faker->numberBetween(1,Campania::count());
    $campania=Campania::where('id',$campania_id)->first();
    $numeroEstado=
    EstadoCampania::join('tipo_campania_estados as tce','tce.estado_campania_id','=','estado_campania.id')
    ->where('tce.tipo_campania_id',$campania->tipo_campania_id)->first()->id;
    return [
        'campania_id' => $campania_id,
        'contacto_id' => $faker->numberBetween(1,2),
        'formacion_id' => $faker->numberBetween(1,Formacion::count()),
        'responsable_id' => $faker->numberBetween(1,User::count()),
        'estado_campania_id' =>$numeroEstado, 
        'justificacion_estado_campania_id' => $numeroEstado,
        'interes' => $faker->optional()->numberBetween(1,5),
        'capacidad' => $faker->optional()->numberBetween(1,5),
        'categoria_oportunidad_id' => $faker->numberBetween(1,CategoriaOportunidad::count()),
        'ingreso_recibido' => 0,
        'ingreso_proyectado' => 0,
        'adicion_manual' => 1,
        'ultima_actualizacion' => Carbon::today(),
        'ultima_interaccion' => Carbon::today(),
    ];
});
