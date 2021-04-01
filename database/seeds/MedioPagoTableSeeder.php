<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class MedioPagoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('medio_pago')->delete();
        
        DB::table('medio_pago')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'En línea',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Recaudo en Banco',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Consignación en Banco',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Corresponsal Bancario',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Transferencia Electrónica',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Cajero Automático',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Pago por Cesantías',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Financiación Entidad Externa',
            ),
        ));
        
        
    }
}