<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brand')->truncate();
        $authors = [
            ['J.K. Rowling', 'Tác giả người Anh nổi tiếng với series Harry Potter, một trong những bộ sách bán chạy nhất lịch sử.'],
            ['George Orwell', 'Nhà văn Anh nổi tiếng với các tác phẩm phản địa đàng như 1984 và Animal Farm.'],
            ['J.R.R. Tolkien', 'Tác giả của The Hobbit và The Lord of the Rings, đặt nền móng cho fantasy hiện đại.'],
            ['Harper Lee', 'Nhà văn Mỹ với tác phẩm kinh điển To Kill a Mockingbird.'],
            ['F. Scott Fitzgerald', 'Nhà văn Mỹ nổi tiếng với The Great Gatsby.'],
            ['Jane Austen', 'Tiểu thuyết gia Anh nổi tiếng với Pride and Prejudice.'],
            ['Paulo Coelho', 'Nhà văn Brazil nổi tiếng với tiểu thuyết The Alchemist.'],
            ['Dan Brown', 'Tác giả các tiểu thuyết trinh thám nổi tiếng như The Da Vinci Code.'],
            ['Yuval Noah Harari', 'Nhà sử học Israel nổi tiếng với Sapiens và Homo Deus.'],
            ['Markus Zusak', 'Tác giả người Úc nổi tiếng với The Book Thief.'],
            ['Stephen King', 'Nhà văn kinh dị nổi tiếng của Mỹ.'],
            ['Agatha Christie', 'Nữ hoàng tiểu thuyết trinh thám.'],
            ['Ernest Hemingway', 'Nhà văn Mỹ đoạt giải Nobel Văn học.'],
            ['Leo Tolstoy', 'Đại văn hào Nga với tác phẩm War and Peace.'],
            ['Fyodor Dostoevsky', 'Nhà văn Nga với các tiểu thuyết triết học sâu sắc.'],
            ['Victor Hugo', 'Nhà văn Pháp nổi tiếng với Les Misérables.'],
            ['Gabriel García Márquez', 'Nhà văn Colombia nổi tiếng với chủ nghĩa hiện thực huyền ảo.'],
            ['Sun Tzu', 'Tác giả binh pháp nổi tiếng The Art of War.'],
            ['Napoleon Hill', 'Tác giả sách phát triển bản thân Think and Grow Rich.'],
            ['James Clear', 'Tác giả cuốn Atomic Habits nổi tiếng về thói quen.'],
        ];

        foreach ($authors as $i => $author) {
            DB::table('brand')->insert([
                'name' => $author[0],
                'slug' => Str::slug($author[0]),
                'sort_order' => $i + 1,
                'description' => $author[1],
                'image' => null,
                'created_by' => 1,
                'updated_by' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
