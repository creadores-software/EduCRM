<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Superadmin',
                'guard_name' => 'web',
                'created_at' => '2021-04-17 12:15:00',
                'updated_at' => '2021-04-17 12:15:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Administrador',
                'guard_name' => 'web',
                'created_at' => '2021-04-17 12:15:00',
                'updated_at' => '2021-04-17 12:15:00',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Coordinador',
                'guard_name' => 'web',
                'created_at' => '2021-04-17 12:15:00',
                'updated_at' => '2021-04-17 12:15:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Auxiliar',
                'guard_name' => 'web',
                'created_at' => '2021-04-17 12:15:00',
                'updated_at' => '2021-04-17 12:15:00',
            ),
        ));
        
        
    }
}