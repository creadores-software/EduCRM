<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class SectorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('sector')->delete();
        
        DB::table('sector')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Privado',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Público',
            ),
        ));
        
        
    }
}