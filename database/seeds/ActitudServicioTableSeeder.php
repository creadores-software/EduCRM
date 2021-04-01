<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ActitudServicioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('actitud_servicio')->delete();
        
        DB::table('actitud_servicio')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Entusiasta',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Positiva',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Indiferente',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Negativa',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Hostil',
            ),
        ));
        
        
    }
}