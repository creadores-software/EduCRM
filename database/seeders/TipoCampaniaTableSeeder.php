<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoCampaniaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_campania')->delete();
        
        DB::table('tipo_campania')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Estudiantes Antiguos',
                'descripcion' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Estudiantes Nuevos',
                'descripcion' => NULL,
            ),
        ));
        
        
    }
}