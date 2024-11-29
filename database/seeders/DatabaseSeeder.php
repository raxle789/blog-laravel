<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = collect([
            ['name' => 'UI UX', 'slug' => 'ui-ux'],
            ['name' => 'Machine Learning', 'slug' => 'machine-learning'],
            ['name' => 'Web Design', 'slug' => 'web-design'],
            ['name' => 'Data Structure', 'slug' => 'data-structure']
        ])->map(function ($category) {
            return Category::create($category);
        });

        Post::factory(20)->recycle([
            User::factory(4)->create(),
            $categories,
        ])->create();
    }
}
