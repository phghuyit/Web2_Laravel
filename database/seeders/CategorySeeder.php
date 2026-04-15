<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->truncate();

        $categories = [

            ['Văn học', 0],
            ['Fantasy', 1],
            ['Khoa học viễn tưởng', 1],
            ['Trinh thám', 1],
            ['Lãng mạn', 1],

            ['Phát triển bản thân', 0],
            ['Tâm lý học', 6],
            ['Kinh doanh', 6],
            ['Kỹ năng sống', 6],

            ['Lịch sử', 0],
            ['Tiểu sử', 10],

            ['Khoa học', 0],
            ['Công nghệ', 12],

            ['Thiếu nhi', 0],
            ['Truyện tranh', 14],

            ['Triết học', 0],
            ['Tôn giáo', 16],

            ['Văn học Việt Nam', 0],
            ['Văn học nước ngoài', 0],
            ['Sách học tập', 0],
        ];

        foreach ($categories as $i => $cat) {

            DB::table('categories')->insert([

                'name' => $cat[0],
                'slug' => Str::slug($cat[0]),
                'image' => null,
                'parent_id' => $cat[1],
                'sort_order' => $i + 1,
                'description' => 'Thể loại sách '.$cat[0],
                'created_by' => 1,
                'updated_by' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ]);

        }

    }
}
