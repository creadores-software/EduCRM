<?php

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
                'con_fecha_fin' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Correo electrónico',
                'con_fecha_fin' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Videconferencia',
                'con_fecha_fin' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Reunión presencial',
                'con_fecha_fin' => 1,
            ),
        ));
        
        
    }
}