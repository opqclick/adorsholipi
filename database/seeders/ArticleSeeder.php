<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Latest Development Updates',
                'body' => 'Recent updates include new features and improvements...',
                'published_at' => now(),
            ],
            [
                'title' => 'Year in Review 2024',
                'body' => 'Looking back at our achievements this year...',
                'published_at' => now()->startOfYear(),
            ],
            [
                'title' => 'Major Release Announcement',
                'body' => 'Announcing our biggest update yet...',
                'published_at' => now()->subYear()->setMonth(6),
            ],
            [
                'title' => 'Getting Started Guide',
                'body' => 'Learn how to get started with our platform...',
                'published_at' => now()->subYear()->startOfYear(),
            ],
            [
                'title' => 'Original Launch Post',
                'body' => 'Introducing our new platform to the world...',
                'published_at' => now()->subYears(2)->setMonth(3),
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => Str::slug($article['title'])],
                array_merge($article, ['slug' => Str::slug($article['title'])])
            );
        }
    }
}
