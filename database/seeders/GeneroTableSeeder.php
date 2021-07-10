<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class GeneroTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('genero')->delete();
        
        DB::table('genero')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Masculino',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Femenino',
            ),
        ));
        
        
    }
}