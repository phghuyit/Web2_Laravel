<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 40; $i++) {

            $price = rand(100, 500);
            $qty = rand(1, 5);

            DB::table('order_detail')->insert([
                'order_id' => rand(1, 20),
                'product_id' => rand(1, 20),
                'price' => $price,
                'qty' => $qty,
                'amount' => $price * $qty,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
