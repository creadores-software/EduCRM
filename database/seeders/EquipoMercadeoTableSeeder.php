<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EquipoMercadeoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('equipo_mercadeo')->delete();
        
        DB::table('equipo_mercadeo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Equipo general',
            ),
        ));
        
        
    }
}