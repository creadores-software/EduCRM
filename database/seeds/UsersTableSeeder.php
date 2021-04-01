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
                'name' => 'Valentina Londoño Marin',
                'email' => 'vlondono@autonoma.edu.co',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Tmk9rw5n2H0n0Vd/CVjRUOHZTpwyUjmgU.IF6WvAw9E2Lpdu8Xqh.',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}