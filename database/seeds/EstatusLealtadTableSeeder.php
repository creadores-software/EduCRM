<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstatusLealtadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estatus_lealtad')->delete();
        
        DB::table('estatus_lealtad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Ninguna',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Media',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Fuerte',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Incondicional',
            ),
        ));
        
        
    }
}