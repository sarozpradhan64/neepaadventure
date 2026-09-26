<?php

namespace Database\Seeders;

use Blaze\AdminCore\Models\Blog;
use Blaze\AdminCore\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create Blog Categories
        $categories = [
            'Himalayan Guides',
            'Trekking Tips',
            'Expedition Logs',
            'Travel News',
            'Gear & Equipment',
        ];

        $createdCategories = [];

        foreach ($categories as $index => $categoryName) {
            $createdCategories[] = BlogCategory::firstOrCreate(
                ['slug' => Str::slug($categoryName)],
                [
                    'name' => $categoryName,
                    'description' => $faker->sentence(10),
                    'status' => true,
                    'sort_order' => $index,
                ]
            );
        }

        // Create Blogs for each category
        foreach ($createdCategories as $category) {
            // Create 3-5 blogs per category
            $numBlogs = rand(3, 5);

            for ($i = 0; $i < $numBlogs; $i++) {
                $title = rtrim($faker->sentence(rand(4, 8)), '.');
                
                Blog::create([
                    'title' => $title,
                    'slug' => Str::slug($title) . '-' . uniqid(),
                    'excerpt' => $faker->paragraph(2),
                    'content' => $this->generateHtmlContent($faker),
                    'status' => true,
                    'blog_category_id' => $category->id,
                    'author_id' => 1, // Assuming user with ID 1 exists
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                ]);
            }
        }
    }

    private function generateHtmlContent($faker): string
    {
        return '<p>' . implode('</p><p>', $faker->paragraphs(4)) . '</p>' .
               '<h2>' . $faker->sentence() . '</h2>' .
               '<p>' . implode('</p><p>', $faker->paragraphs(3)) . '</p>';
    }
}
