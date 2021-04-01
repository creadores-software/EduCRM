<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class EstadoDisposicionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('estado_disposicion')->delete();
        
        DB::table('estado_disposicion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'No consciente',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Consciente',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Interesado informado',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Deseoso',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Con intención de compra',
            ),
        ));
        
        
    }
}