<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

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
            0 => 
            array (
                'id' => 1,
                'campania_id' => 1,
                'contacto_id' => 2,
                'formacion_id' => 13410,
                'responsable_id' => 4,
                'estado_campania_id' => 1,
                'justificacion_estado_campania_id' => 1,
                'interes' => 4,
                'capacidad' => 2,
                'categoria_oportunidad_id' => 3,
                'ingreso_recibido' => NULL,
                'ingreso_proyectado' => NULL,
                'adicion_manual' => 0,
                'ultima_actualizacion' => '2021-06-25 21:42:47',
                'ultima_interaccion' => NULL,
            ),
        ));
        
        
    }
}