<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class OrigenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('origen')->delete();
        
        DB::table('origen')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Feria de universidades',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Visitas al colegio',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Radio',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Televisión',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Internet',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Referido',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Pariente',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Otro',
            ),
        ));
        
        
    }
}