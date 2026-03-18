<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    for ($i = 1; $i <= 20; $i++) {
        DB::table('posts')->insert([
            'topic_id' => rand(1,5),
            'title' => 'Post ' . $i,
            'slug' => 'post-' . $i,
            'detail' => 'Nội dung bài viết ' . $i,
            'image' => 'post' . $i . '.jpg',
            'post_type' => rand(1,2) == 1 ? 'post' : 'page',
            'description' => 'Mô tả post ' . $i,
            'created_by' => 1,
            'updated_by' => null,
            'status' => rand(1,2),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
