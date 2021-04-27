<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class SisbenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('sisben')->delete();
        
        DB::table('sisben')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'A',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'B',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'C',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'D',
            ),
        ));
        
        
    }
}