<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BannerSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ContactSeeder::class,
            MenuSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            PostSeeder::class,
            ProductSeeder::class,
            TopicSeeder::class,
            UserSeeder::class,
        ]);
    }
}
