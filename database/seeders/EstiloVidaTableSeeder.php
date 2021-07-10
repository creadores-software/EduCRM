<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstiloVidaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estilo_vida')->delete();
        
        DB::table('estilo_vida')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Orientación a la cultura',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Orientación al deporte',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Orientación a las actividades al aire libre',
            ),
        ));
        
        
    }
}