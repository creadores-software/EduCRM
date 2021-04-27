<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('model_has_roles')->delete();
        
        DB::table('model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'model_type' => 'App\\Models\\Admin\\User',
                'model_id' => 1,
            ),
            1 => 
            array (
                'role_id' => 2,
                'model_type' => 'App\\Models\\Admin\\User',
                'model_id' => 2,
            ),
            2 => 
            array (
                'role_id' => 3,
                'model_type' => 'App\\Models\\Admin\\User',
                'model_id' => 3,
            ),
            3 => 
            array (
                'role_id' => 4,
                'model_type' => 'App\\Models\\Admin\\User',
                'model_id' => 4,
            ),
        ));
        
        
    }
}