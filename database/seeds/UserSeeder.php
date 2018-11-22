<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        //insert some dummy records
        DB::table('users')->insert(array(
                array(
                    'name'=>'Admin',
                    'last_name'=> 'Admin',
                    'email' => 'admin@gug.com',
                    'user_type' => 'superAdmin',
                    'password' => bcrypt('q123456')
                )
            )
        );
    }
}
