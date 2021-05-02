<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoInteraccionEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_interaccion_estados')->delete();
        
        DB::table('tipo_interaccion_estados')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipo_interaccion_id' => 2,
                'estado_interaccion_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'tipo_interaccion_id' => 2,
                'estado_interaccion_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'tipo_interaccion_id' => 2,
                'estado_interaccion_id' => 5,
            ),
            3 => 
            array (
                'id' => 4,
                'tipo_interaccion_id' => 1,
                'estado_interaccion_id' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'tipo_interaccion_id' => 1,
                'estado_interaccion_id' => 2,
            ),
            5 => 
            array (
                'id' => 6,
                'tipo_interaccion_id' => 1,
                'estado_interaccion_id' => 6,
            ),
            6 => 
            array (
                'id' => 7,
                'tipo_interaccion_id' => 1,
                'estado_interaccion_id' => 4,
            ),
            7 => 
            array (
                'id' => 8,
                'tipo_interaccion_id' => 1,
                'estado_interaccion_id' => 3,
            ),
            8 => 
            array (
                'id' => 9,
                'tipo_interaccion_id' => 4,
                'estado_interaccion_id' => 2,
            ),
            9 => 
            array (
                'id' => 10,
                'tipo_interaccion_id' => 4,
                'estado_interaccion_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'tipo_interaccion_id' => 4,
                'estado_interaccion_id' => 8,
            ),
            11 => 
            array (
                'id' => 12,
                'tipo_interaccion_id' => 4,
                'estado_interaccion_id' => 7,
            ),
            12 => 
            array (
                'id' => 13,
                'tipo_interaccion_id' => 3,
                'estado_interaccion_id' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'tipo_interaccion_id' => 3,
                'estado_interaccion_id' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'tipo_interaccion_id' => 3,
                'estado_interaccion_id' => 8,
            ),
            15 => 
            array (
                'id' => 16,
                'tipo_interaccion_id' => 3,
                'estado_interaccion_id' => 7,
            ),
        ));
        
        
    }
}