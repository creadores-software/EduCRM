<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class InformacionRelacionalTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('informacion_relacional')->delete();
        
        DB::table('informacion_relacional')->insert(array (
            0 => 
            array (
                'id' => 1,
                'maximo_nivel_formacion_id' => NULL,
                'ocupacion_actual_id' => NULL,
                'estilo_vida_id' => NULL,
                'religion_id' => NULL,
                'raza_id' => NULL,
                'generacion_id' => NULL,
                'personalidad_id' => NULL,
                'beneficio_id' => NULL,
                'frecuencia_uso_id' => NULL,
                'estatus_usuario_id' => NULL,
                'estatus_lealtad_id' => NULL,
                'estado_disposicion_id' => NULL,
                'actitud_servicio_id' => NULL,
                'autoriza_comunicacion' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'maximo_nivel_formacion_id' => NULL,
                'ocupacion_actual_id' => NULL,
                'estilo_vida_id' => NULL,
                'religion_id' => NULL,
                'raza_id' => NULL,
                'generacion_id' => NULL,
                'personalidad_id' => NULL,
                'beneficio_id' => NULL,
                'frecuencia_uso_id' => NULL,
                'estatus_usuario_id' => NULL,
                'estatus_lealtad_id' => NULL,
                'estado_disposicion_id' => NULL,
                'actitud_servicio_id' => NULL,
                'autoriza_comunicacion' => 1,
            ),
        ));
        
        
    }
}