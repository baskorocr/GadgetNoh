<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'nama' => 'OPPO A95',
            'brand_id' => 1,
            'harga' => 3999000,
            'gambar' => 'oppo a95.jpeg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'OPPO A53',
            'brand_id' => 1,
            'harga' => 2090000,
            'gambar' => 'oppo a53.jpeg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'IPHONE 12 PRO MAX',
            'brand_id' => 2,
            'harga' => 14600000,
            'gambar' => 'iphone 12 promax.jpeg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'IPHONE 11 PRO MAX',
            'brand_id' => 2,
            'harga' => 12500000,
            'gambar' => 'iphone 11 promax.jpeg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'IPHONE 8 PLUS',
            'brand_id' => 2,
            'harga' => 4361000,
            'gambar' => 'iphone 8 plus.jpeg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'IPHONE XR',
            'brand_id' => 2,
            'harga' => 6300000,
            'gambar' => 'iphone XR.jpeg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'SAMSUNG A12',
            'brand_id' => 3,
            'harga' => 2135000,
            'gambar' => 'samsung a12.jpeg'
        ]);

        DB::table('products')->insert([
        	'nama' => 'SAMSUNG GALAXY A02s',
            'brand_id' => 3,
            'harga' => 1599000,
            'gambar' => 'samsung a02s.jpeg'
        ]);

     
    }
}
