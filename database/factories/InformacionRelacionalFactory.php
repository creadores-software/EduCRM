<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contactos\InformacionRelacional;
use App\Models\Entidades\Ocupacion;
use App\Models\Formaciones\NivelFormacion;
use App\Models\Parametros\ActitudServicio;
use App\Models\Parametros\Beneficio;
use App\Models\Parametros\EstadoDisposicion;
use App\Models\Parametros\EstatusLealtad;
use App\Models\Parametros\EstatusUsuario;
use App\Models\Parametros\EstiloVida;
use App\Models\Parametros\FrecuenciaUso;
use App\Models\Parametros\Generacion;
use App\Models\Parametros\Personalidad;
use App\Models\Parametros\Raza;
use App\Models\Parametros\Religion;
use Faker\Generator as Faker;

$factory->define(InformacionRelacional::class, function (Faker $faker) {

    return [
        'maximo_nivel_formacion_id' => $faker->numberBetween(1,NivelFormacion::count()),
        'ocupacion_actual_id' => $faker->numberBetween(1,Ocupacion::count()),
        'estilo_vida_id' => $faker->numberBetween(1,EstiloVida::count()),
        'religion_id' => $faker->numberBetween(1,Religion::count()),
        'raza_id' => $faker->numberBetween(1,Raza::count()),
        'generacion_id' => $faker->numberBetween(1,Generacion::count()),
        'personalidad_id' => $faker->numberBetween(1,Personalidad::count()),
        'beneficio_id' => $faker->numberBetween(1,Beneficio::count()),
        'frecuencia_uso_id' => $faker->numberBetween(1,FrecuenciaUso::count()),
        'estatus_usuario_id' => $faker->numberBetween(1,EstatusUsuario::count()),
        'estatus_lealtad_id' => $faker->numberBetween(1,EstatusLealtad::count()),
        'estado_disposicion_id' => $faker->numberBetween(1,EstadoDisposicion::count()),
        'actitud_servicio_id' =>$faker->numberBetween(1,ActitudServicio::count()),
        'autoriza_comunicacion' => true
    ];
});
