<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name'=>'Admin',
               'email'=>'admingadget@gmail.com',
                'role'=>'admin',
               'password'=> bcrypt('admin1234'),
        ]);
    }
}
