<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class NivelAcademicoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('nivel_academico')->delete();
        
        DB::table('nivel_academico')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Pregrado',
                'es_ies' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Posgrado',
                'es_ies' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Educación no formal',
                'es_ies' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Educación escolar',
                'es_ies' => 0,
            ),
        ));
        
        
    }
}