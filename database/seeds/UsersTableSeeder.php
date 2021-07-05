<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Administrador CRM',
                'email' => 'superadmin@crm.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$BKgYa6HX/9FQgh3rNuQ0VuYe1XRJrbBYTGxKL4NO1O2vDyoL6XWKy',
                'remember_token' => NULL,
                'created_at' => '2021-04-17 12:20:15',
                'updated_at' => '2021-04-17 12:39:19',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin CRM',
                'email' => 'admin@crm.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$SyoQGldDFtrrPQfciSd2Z.ll2Cp5gTaeP7CglcHoR1o9V1zRbqMRy',
                'remember_token' => NULL,
                'created_at' => '2021-04-17 12:39:42',
                'updated_at' => '2021-04-17 12:39:42',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Coordinador CRM',
                'email' => 'coordinador@crm.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$EVn1639bjIe9KC2UMCFFG.CcxO8J8aTPifRkyqwqdWMGb9YbaIENG',
                'remember_token' => NULL,
                'created_at' => '2021-04-17 12:40:04',
                'updated_at' => '2021-04-17 12:40:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Auxiliar CRM',
                'email' => 'auxiliar@crm.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$2bWH67ii4YLitVJyNrovDehh//71FE09SG3cZML/L89yDdwQ1JpO6',
                'remember_token' => NULL,
                'created_at' => '2021-04-17 12:40:28',
                'updated_at' => '2021-04-17 12:40:28',
            ),
        ));
        
        
    }
}