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
        DB::table('menus')->truncate();

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

        $parent = DB::table('menus')
            ->where('name', 'Tất cả sản phẩm')
            ->where('parent_id', 0)
            ->first();

        if ($parent) {
            $subprod = [
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
            DB::table('menus')->insert($subprod);
        }

        $footerParents = [
            [
                'name' => 'Về Chúng Tôi',
                'link' => '#',
                'type' => 'custom',
                'parent_id' => 0,
                'position' => 'footer',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hợp Tác Cùng Chúng Tôi',
                'link' => '#',
                'type' => 'custom',
                'parent_id' => 0,
                'position' => 'footer',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thanh Toán',
                'link' => '#',
                'type' => 'custom',
                'parent_id' => 0,
                'position' => 'footer',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hỗ Trợ Khách Hàng',
                'link' => '#',
                'type' => 'custom',
                'parent_id' => 0,
                'position' => 'footer',
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('menus')->insert($footerParents);

        $aboutUs = DB::table('menus')
        ->where('name', 'Về Chúng Tôi')
        ->where('position', 'footer')
        ->first();
        if ($aboutUs) {
            DB::table('menus')->insert([
                ['name' => 'Giới thiệu', 'link' => '#', 'type' => 'custom', 'parent_id' => $aboutUs->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Tuyển dụng', 'link' => '#', 'type' => 'custom', 'parent_id' => $aboutUs->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Thông cáo báo chí', 'link' => '#', 'type' => 'custom', 'parent_id' => $aboutUs->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Quan hệ nhà đầu tư', 'link' => '#', 'type' => 'custom', 'parent_id' => $aboutUs->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        $coop = DB::table('menus')
        ->where('name', 'Hợp Tác Cùng Chúng Tôi')
        ->where('position', 'footer')
        ->first();
        if ($coop) {
            DB::table('menus')->insert([
                ['name' => 'Bán hàng trên Amazin', 'link' => '#', 'type' => 'custom', 'parent_id' => $coop->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Tiếp thị liên kết', 'link' => '#', 'type' => 'custom', 'parent_id' => $coop->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Quảng cáo sản phẩm', 'link' => '#', 'type' => 'custom', 'parent_id' => $coop->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Xuất bản sách Kindle', 'link' => '#', 'type' => 'custom', 'parent_id' => $coop->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        $payment = DB::table('menus')
        ->where('name', 'Thanh Toán')
        ->where('position', 'footer')
        ->first();
        if ($payment) {
            DB::table('menus')->insert([
                ['name' => 'Thẻ doanh nghiệp', 'link' => '#', 'type' => 'custom', 'parent_id' => $payment->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Mua sắm bằng điểm', 'link' => '#', 'type' => 'custom', 'parent_id' => $payment->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Nạp tiền vào số dư', 'link' => '#', 'type' => 'custom', 'parent_id' => $payment->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Chuyển đổi tiền tệ', 'link' => '#', 'type' => 'custom', 'parent_id' => $payment->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        $support = DB::table('menus')
        ->where('name', 'Hỗ Trợ Khách Hàng')
        ->where('position', 'footer')
        ->first();
        if ($support) {
            DB::table('menus')->insert([
                ['name' => 'Tài khoản của bạn', 'link' => '#', 'type' => 'custom', 'parent_id' => $support->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Trung tâm đổi trả', 'link' => '#', 'type' => 'custom', 'parent_id' => $support->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Trợ giúp', 'link' => '#', 'type' => 'custom', 'parent_id' => $support->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Phí vận chuyển', 'link' => '#', 'type' => 'custom', 'parent_id' => $support->id, 'position' => 'footer', 'status' => 1, 'created_by' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }
}
