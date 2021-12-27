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
               'email'=>'mahesa.23@students.amikom.ac.id',
                'role'=>'admin',
               'password'=> bcrypt('asu123ok'),
        ]);
    }
}
