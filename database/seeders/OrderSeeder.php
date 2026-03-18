<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    for ($i = 1; $i <= 20; $i++) {
        DB::table('order')->insert([
            'user_id' => rand(1,5),
            'name' => 'Customer ' . $i,
            'phone' => '09100000' . $i,
            'email' => 'customer' . $i . '@gmail.com',
            'address' => 'Address ' . $i,
            'note' => 'Note order ' . $i,
            'updated_by' => null,
            'status' => rand(1,2),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
