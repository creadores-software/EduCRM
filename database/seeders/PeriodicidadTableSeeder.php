<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PeriodicidadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('periodicidad')->delete();
        
        DB::table('periodicidad')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Semestral',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Periodos',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Anual',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Trimestral',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Cuatrimestral',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Por cohorte',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Mensual',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Bimensual',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Bimestral',
            ),
        ));
        
        
    }
}