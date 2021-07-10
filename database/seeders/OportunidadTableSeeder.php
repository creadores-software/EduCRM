<?php

use Carbon\Carbon;
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OportunidadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('oportunidad')->delete();
        
        DB::table('oportunidad')->insert(array (
            0 => //Oportunidad roja de auxiliar - Camp1
            array (
                'id' => 1,
                'campania_id' => 1,
                'contacto_id' => 2,
                'formacion_id' => 13410, //ADMINISTRACIÓN DE EMPRESAS
                'responsable_id' => 4,
                'estado_campania_id' => 1,
                'justificacion_estado_campania_id' => 1,
                'interes' => NULL,
                'capacidad' => NULL,
                'categoria_oportunidad_id' => NULL,
                'ingreso_recibido' => NULL,
                'ingreso_proyectado' => NULL,
                'interes' => 4,
                'capacidad' => 2,
                'categoria_oportunidad_id' => 3,
                'adicion_manual' => 0,
                'ultima_actualizacion' => Carbon::today()->subMonths(3),
                'ultima_interaccion' => Carbon::today()->subMonths(3),
            ),
            1 => //Oportunidad amarilla de admin  - Camp1
            array (
                'id' => 2,
                'campania_id' => 1,
                'contacto_id' => 1,
                'formacion_id' => NULL,
                'responsable_id' => 1,
                'estado_campania_id' => 1,
                'justificacion_estado_campania_id' => 1,
                'interes' => NULL,
                'capacidad' => NULL,
                'categoria_oportunidad_id' => NULL,
                'ingreso_recibido' => NULL,
                'ingreso_proyectado' => NULL,
                'adicion_manual' => 0,
                'ultima_actualizacion' => Carbon::today()->subDays(60),
                'ultima_interaccion' => Carbon::today()->subDays(60),
            ),
            2 => //Oportunidad verde de admin - Camp2
            array (
                'id' => 3,
                'campania_id' => 2,
                'contacto_id' => 1,
                'formacion_id' => 13423, //ESPECIALIZACIÓN EN AUDITORIA EN SALUD
                'responsable_id' => 1,
                'estado_campania_id' => 6,
                'justificacion_estado_campania_id' => 6,
                'interes' => NULL,
                'capacidad' => NULL,
                'categoria_oportunidad_id' => NULL,
                'ingreso_recibido' => NULL,
                'ingreso_proyectado' => NULL,
                'adicion_manual' => 0,
                'ultima_actualizacion' => Carbon::today(),
                'ultima_interaccion' => Carbon::today(),
            ),
            3 => //Oportunidad verde de auxiliar - Camp2
            array (
                'id' => 4,
                'campania_id' => 2,
                'contacto_id' => 2,
                'formacion_id' => 13413, //Diseño de modas
                'responsable_id' => 4,
                'estado_campania_id' => 6,
                'justificacion_estado_campania_id' => 6,
                'interes' => NULL,
                'capacidad' => NULL,
                'categoria_oportunidad_id' => NULL,
                'ingreso_recibido' => NULL,
                'ingreso_proyectado' => NULL,
                'adicion_manual' => 0,
                'ultima_actualizacion' => Carbon::today(),
                'ultima_interaccion' => Carbon::today(),
            ),
            4 => //Oportunidad matriculado Coordinador - Camp1
            array (
                'id' => 5,
                'campania_id' => 2,
                'contacto_id' => 2,
                'formacion_id' => 13477, //INGENIERIA DE SISTEMAS
                'responsable_id' => 3,
                'estado_campania_id' => 3,
                'justificacion_estado_campania_id' => 3,
                'interes' => NULL,
                'capacidad' => NULL,
                'categoria_oportunidad_id' => NULL,
                'ingreso_recibido' => NULL,
                'ingreso_proyectado' => NULL,
                'adicion_manual' => 0,
                'ultima_actualizacion' => Carbon::today(),
                'ultima_interaccion' => Carbon::today(),
            ),
        ));
        
        
    }
}