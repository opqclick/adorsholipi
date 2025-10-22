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
        $samples = [
            [
                'title' => 'Getting Started with Adorsholipi',
                'body' => "Welcome to Adorsholipi — a simple demo app.\n\nThis article walks you through the basics: creating articles, editing them, and browsing the list.",
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'How to Use Blade Templates',
                'body' => "Blade is Laravel's templating engine. Use @extends and @section to compose layouts and keep views DRY.",
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Deploying Locally with Valet',
                'body' => "Laravel Valet is ideal for macOS local development. Park your project and access it at the configured .test domain.",
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Writing Clean Controllers',
                'body' => "Keep controllers thin: validate requests, delegate business logic to services or models, and return responses or views.",
                'published_at' => now()->subDay(),
            ],
        ];

        foreach ($samples as $item) {
            Article::updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                array_merge($item, ['slug' => Str::slug($item['title'])])
            );
        }
    }
}
