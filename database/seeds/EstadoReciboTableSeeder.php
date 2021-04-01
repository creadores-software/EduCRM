<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstadoReciboTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estado_recibo')->delete();
        
        DB::table('estado_recibo')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Pendiente',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'En trámite',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Pago',
            ),
        ));
        
        
    }
}