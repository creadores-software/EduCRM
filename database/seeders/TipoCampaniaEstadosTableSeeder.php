<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoCampaniaEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_campania_estados')->delete();
        
        DB::table('tipo_campania_estados')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipo_campania_id' => 1,
                'estado_campania_id' => 1,
                'orden' => 1,
                'dias_cambio' => 60,
            ),
            1 => 
            array (
                'id' => 2,
                'tipo_campania_id' => 1,
                'estado_campania_id' => 2,
                'orden' => 2,
                'dias_cambio' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'tipo_campania_id' => 1,
                'estado_campania_id' => 5,
                'orden' => 3,
                'dias_cambio' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'tipo_campania_id' => 1,
                'estado_campania_id' => 3,
                'orden' => 4,
                'dias_cambio' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'tipo_campania_id' => 1,
                'estado_campania_id' => 4,
                'orden' => 5,
                'dias_cambio' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'tipo_campania_id' => 2,
                'estado_campania_id' => 6,
                'orden' => 1,
                'dias_cambio' => 60,
            ),
            6 => 
            array (
                'id' => 7,
                'tipo_campania_id' => 2,
                'estado_campania_id' => 5,
                'orden' => 2,
                'dias_cambio' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'tipo_campania_id' => 2,
                'estado_campania_id' => 4,
                'orden' => 3,
                'dias_cambio' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'tipo_campania_id' => 2,
                'estado_campania_id' => 7,
                'orden' => 4,
                'dias_cambio' => 15,
            ),
            9 => 
            array (
                'id' => 10,
                'tipo_campania_id' => 2,
                'estado_campania_id' => 8,
                'orden' => 5,
                'dias_cambio' => 30,
            ),
            10 => 
            array (
                'id' => 11,
                'tipo_campania_id' => 2,
                'estado_campania_id' => 10,
                'orden' => 6,
                'dias_cambio' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'tipo_campania_id' => 2,
                'estado_campania_id' => 9,
                'orden' => 7,
                'dias_cambio' => 60,
            ),
            12 => 
            array (
                'id' => 13,
                'tipo_campania_id' => 2,
                'estado_campania_id' => 3,
                'orden' => 8,
                'dias_cambio' => 0,
            ),
        ));
    }
}