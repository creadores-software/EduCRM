<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PeriodoAcademicoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('periodo_academico')->delete();
        
        DB::table('periodo_academico')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => '2020-01',
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2020-05-31',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => '2020-02',
                'fecha_inicio' => '2020-06-01',
                'fecha_fin' => '2020-07-31',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => '2020-03',
                'fecha_inicio' => '2020-08-01',
                'fecha_fin' => '2020-12-31',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => '2021-01',
                'fecha_inicio' => '2021-01-01',
                'fecha_fin' => '2021-05-31',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => '2021-02',
                'fecha_inicio' => '2021-06-01',
                'fecha_fin' => '2021-07-31',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => '2021-03',
                'fecha_inicio' => '2021-08-01',
                'fecha_fin' => '2021-12-31',
            ),
        ));
        
        
    }
}