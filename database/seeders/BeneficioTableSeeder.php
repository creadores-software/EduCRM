<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class BeneficioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('beneficio')->delete();
        
        DB::table('beneficio')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Calidad',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Servicio',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Economía',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Rapidez',
            ),
        ));
        
        
    }
}