<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TipoInteraccionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('tipo_interaccion')->delete();
        
        DB::table('tipo_interaccion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Llamada',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Correo electrónico',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Videconferencia',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Reunión presencial',
            ),
        ));
        
        
    }
}