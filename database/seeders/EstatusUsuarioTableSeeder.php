<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstatusUsuarioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estatus_usuario')->delete();
        
        DB::table('estatus_usuario')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'No estudiante',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Estudiante antiguo',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Aspirante',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Estudiante nuevo',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Estudiante recurrente',
            ),
        ));
        
        
    }
}