<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class FacultadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('facultad')->delete();
        
        DB::table('facultad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Ingeniería',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Salud',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Estudios Sociales y Empresariales',
            ),
        ));
        
        
    }
}