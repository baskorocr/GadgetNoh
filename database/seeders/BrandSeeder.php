<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
        	'nama' => 'OPPO',
        	'serial' => 'Android',
        	'gambar' => 'oppo.png',
        ]);

        DB::table('brands')->insert([
        	'nama' => 'Apple',
        	'serial' => 'Apple',
        	'gambar' => 'apple.png',
        ]);

        DB::table('brands')->insert([
        	'nama' => 'Samsung',
        	'serial' => 'Android',
        	'gambar' => 'samsung.png',
        ]);
    }
}
