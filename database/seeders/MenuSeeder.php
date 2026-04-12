<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Thể loại',
                'link' => '/category',
                'type' => 'category',
                'position' => 'header',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tất cả sản phẩm',
                'link' => '/products',
                'type' => 'custom',
                'position' => 'header',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Liên Hệ',
                'link' => '/contact',
                'type' => 'custom',
                'position' => 'header',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('menus')->insert($menus);
    }
}
