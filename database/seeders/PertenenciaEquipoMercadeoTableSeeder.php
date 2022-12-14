<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PertenenciaEquipoMercadeoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('pertenencia_equipo_mercadeo')->delete();
        
        DB::table('pertenencia_equipo_mercadeo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'users_id' => 1,
                'equipo_mercadeo_id' => 1,
                'es_lider' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'users_id' => 4,
                'equipo_mercadeo_id' => 1,
                'es_lider' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'users_id' => 3,
                'equipo_mercadeo_id' => 1,
                'es_lider' => 0,
            ),
        ));
        
        
    }
}