<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    for ($i = 1; $i <= 10; $i++) {
        DB::table('user')->insert([
            'name' => 'User ' . $i,
            'email' => 'user' . $i . '@gmail.com',
            'phone' => '09300000' . $i,
            'username' => 'user' . $i,
            'password' => bcrypt('123456'),
            'address' => 'Address ' . $i,
            'image' => 'user' . $i . '.jpg',
            'roles' => $i == 1 ? 'admin' : 'user',
            'created_by' => 1,
            'updated_by' => null,
            'status' => rand(1,2),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
