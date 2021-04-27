<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class JornadaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('jornada')->delete();
        
        DB::table('jornada')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Diurna',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Extendida',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Viernes',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Sábados',
            ),
        ));
        
        
    }
}