<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Order of seeding:
     * 1. UserSeeder - Creates admin users
     * 2. PostSeeder - Creates blog posts
     * 3. GameSeeder - Creates sample games and categories
     * 4. LandingSectionSeeder - Creates default landing page sections
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            GameSeeder::class,
            LandingSectionSeeder::class,
            OrionStarSeeder::class,
        ]);
    }
}
