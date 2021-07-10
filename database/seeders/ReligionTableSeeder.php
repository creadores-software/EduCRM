<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ReligionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('religion')->delete();
        
        DB::table('religion')->insert(array (
            0 => 
            array (
                'id' => 1,
            'nombre' => 'Católico(a)',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Protestante',
            ),
            2 => 
            array (
                'id' => 3,
            'nombre' => 'Judío(a)',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Musulmán',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Hindú',
            ),
        ));
        
        
    }
}