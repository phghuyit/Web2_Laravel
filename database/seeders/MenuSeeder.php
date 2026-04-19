<?php

namespace Database\Seeders;

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
                'link' => '',
                'type' => 'category',
                'parent_id' => 0,
                'position' => 'header',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tất cả sản phẩm',
                'link' => 'site.product.index',
                'type' => 'custom',
                'parent_id' => 0,
                'position' => 'header',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Liên Hệ',
                'link' => 'site.contact.index',
                'type' => 'custom',
                'parent_id' => 0,
                'position' => 'header',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Về Chúng Tôi',
                'link' => 'site.contact.aboutUs',
                'type' => 'custom',
                'parent_id' => 0,
                'position' => 'header',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('menus')->insert($menus);

        $parent = DB::table('menus')->where('name', 'Tất cả sản phẩm')->first();

        if ($parent) {
            $submenus = [
                [
                    'name' => 'Siêu Sale',
                    'link' => 'site.product.index',
                    'type' => 'custom',
                    'parent_id' => $parent->id,
                    'position' => 'header',
                    'status' => 1,
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Bán Chạy',
                    'link' => 'site.product.index',
                    'type' => 'custom',
                    'parent_id' => $parent->id,
                    'position' => 'header',
                    'status' => 1,
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Mới Ra',
                    'link' => 'site.product.index',
                    'type' => 'custom',
                    'parent_id' => $parent->id,
                    'position' => 'header',
                    'status' => 1,
                    'created_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ];
            DB::table('menus')->insert($submenus);
        }
    }
}
