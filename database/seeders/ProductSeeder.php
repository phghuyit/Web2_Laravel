<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
    {

        $books = [

        ['Harry Potter and the Sorcerer\'s Stone','9780439554930',1,1],

        ['1984','9780451524935',2,2],
        ['Animal Farm','9780451526342',2,2],

        ['The Hobbit','9780345339683',3,1],
        ['The Lord of the Rings','9780618640157',3,1],

        ['To Kill a Mockingbird','9780061120084',4,3],

        ['The Great Gatsby','9780743273565',5,3],

        ['Pride and Prejudice','9781503290563',6,3],

        ['The Alchemist','9780061122415',7,6],

        ['The Da Vinci Code','9780307474278',8,4], // Dan Brown = 8 ✅

        ['Sapiens','9780062316097',9,5],

        ['The Book Thief','9780375842207',10,3],

        ['The Shining','9780307743657',11,1],

        ['Murder on the Orient Express','9780062693662',12,4],

        ['The Old Man and the Sea','9780684801223',13,3],

        ['War and Peace','9780199232765',14,3],

        ['Crime and Punishment','9780486415871',15,3],

        ['Les Misérables','9780451419439',16,3],

        ['One Hundred Years of Solitude','9780060883287',17,3],

        ['Atomic Habits','9780735211292',20,6]

    ];

        foreach($books as $book){

        $buy=rand(30000,120000);
        $sale=rand(130000,250000);

        DB::table('products')->insert([
            'category_id'=>$book[3],
            'brand_id'=>$book[2],
            'name'=>$book[0],
            'slug'=>Str::slug($book[0]),
            'price_buy'=>$buy,
            'price_sale'=>$sale,
            'image'=>'https://covers.openlibrary.org/b/isbn/'.$book[1].'-L.jpg',
            'qty'=>rand(20,200),
            'detail'=>'Nội dung chi tiết của sách '.$book[0].'. Đây là một trong những tác phẩm nổi tiếng trên thế giới.',
            'description'=>'Ebook nổi tiếng: '.$book[0],
            'created_by'=>1,
            'updated_by'=>null,
            'status'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        }
    }
}
