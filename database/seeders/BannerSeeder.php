<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {

            DB::table('banner')->insert([
                'name' => 'Banner '.$i,
                'link' => '/banner-'.$i,
                'sort_order' => $i,
                'position' => 'slideshow',
                'description' => 'Banner quảng cáo '.$i,
                'image' => 'banner'.$i.'.jpg',
                'created_by' => 1,
                'updated_by' => null,
                'status' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}
