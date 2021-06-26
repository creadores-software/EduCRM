<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class JustificacionEstadoCampaniaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('justificacion_estado_campania')->delete();
        
        DB::table('justificacion_estado_campania')->insert(array (
            0 => 
            array (
                'id' => 1,
                'estado_campania_id' => 1,
                'nombre' => 'No aplica',
            ),
            1 => 
            array (
                'id' => 2,
                'estado_campania_id' => 2,
                'nombre' => 'No aplica',
            ),
            2 => 
            array (
                'id' => 3,
                'estado_campania_id' => 3,
                'nombre' => 'No aplica',
            ),
            3 => 
            array (
                'id' => 4,
                'estado_campania_id' => 4,
                'nombre' => 'No aplica',
            ),
            4 => 
            array (
                'id' => 5,
                'estado_campania_id' => 5,
                'nombre' => 'No aplica',
            ),
            5 => 
            array (
                'id' => 6,
                'estado_campania_id' => 6,
                'nombre' => 'No aplica',
            ),
            6 => 
            array (
                'id' => 7,
                'estado_campania_id' => 7,
                'nombre' => 'No aplica',
            ),
            7 => 
            array (
                'id' => 8,
                'estado_campania_id' => 8,
                'nombre' => 'No aplica',
            ),
            8 => 
            array (
                'id' => 9,
                'estado_campania_id' => 9,
                'nombre' => 'No aplica',
            ),
            9 => 
            array (
                'id' => 10,
                'estado_campania_id' => 10,
                'nombre' => 'No aplica',
            ),
            10 => 
            array (
                'id' => 11,
                'estado_campania_id' => 4,
                'nombre' => 'Motivos académicos',
            ),
            11 => 
            array (
                'id' => 12,
                'estado_campania_id' => 4,
                'nombre' => 'Cambio de universidad',
            ),
            12 => 
            array (
                'id' => 13,
                'estado_campania_id' => 4,
                'nombre' => 'Motivos personales',
            ),
            13 => 
            array (
                'id' => 14,
                'estado_campania_id' => 1,
                'nombre' => 'Deudor UAM',
            ),
            14 => 
            array (
                'id' => 15,
                'estado_campania_id' => 1,
                'nombre' => 'Paga de contado',
            ),
            15 => 
            array (
                'id' => 16,
                'estado_campania_id' => 1,
                'nombre' => 'Financiación UAM',
            ),
            16 => 
            array (
                'id' => 17,
                'estado_campania_id' => 1,
                'nombre' => 'Deudor Icetex',
            ),
            17 => 
            array (
                'id' => 18,
                'estado_campania_id' => 1,
                'nombre' => 'Pendiente legalización Icetex',
            ),
            18 => 
            array (
                'id' => 19,
                'estado_campania_id' => 2,
                'nombre' => 'Graduado verificado',
            ),
            19 => 
            array (
                'id' => 20,
                'estado_campania_id' => 2,
                'nombre' => 'Posible graduado',
            ),
            20 => 
            array (
                'id' => 21,
                'estado_campania_id' => 5,
                'nombre' => 'Motivos personales',
            ),
            21 => 
            array (
                'id' => 22,
                'estado_campania_id' => 5,
                'nombre' => 'Motivos económicos',
            ),
            22 => 
            array (
                'id' => 23,
                'estado_campania_id' => 5,
                'nombre' => 'Motivos de viaje',
            ),
        ));
        
        
    }
}