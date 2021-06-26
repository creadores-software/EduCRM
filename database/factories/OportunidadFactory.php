<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\User;
use App\Models\Campanias\Campania;
use App\Models\Campanias\CategoriaOportunidad;
use App\Models\Campanias\EstadoCampania;
use App\Models\Campanias\JustificacionEstadoCampania;
use App\Models\Campanias\Oportunidad;
use App\Models\Contactos\Contacto;
use App\Models\Formaciones\Formacion;
use Faker\Generator as Faker;

$factory->define(Oportunidad::class, function (Faker $faker) {

    return [
        'campania_id' => $faker->numberBetween(1,Campania::count()),
        'contacto_id' => $faker->numberBetween(1,2),
        'formacion_id' => $faker->numberBetween(1,Formacion::count()),
        'responsable_id' => $faker->numberBetween(1,User::count()),
        'estado_campania_id' => $faker->numberBetween(1,EstadoCampania::count()),
        'justificacion_estado_campania_id' => $faker->numberBetween(1,JustificacionEstadoCampania::count()),
        'interes' => $faker->optional()->numberBetween(1,5),
        'capacidad' => $faker->optional()->numberBetween(1,5),
        'categoria_oportunidad_id' => $faker->numberBetween(1,CategoriaOportunidad::count()),
        'ingreso_recibido' => $faker->randomNumber,
        'ingreso_proyectado' => $faker->randomNumber,
        'adicion_manual' => 1,
        'ultima_actualizacion' => $faker->date('Y-m-d H:i:s'),
        'ultima_interaccion' => $faker->date('Y-m-d H:i:s'),
    ];
});
