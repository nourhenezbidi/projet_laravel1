<?php

namespace Database\Seeders;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
class BlogPostSeeder extends Seeder
{
    public function run()
    {
        $blogPosts = [
            [
                'title' => 'First Blog Post',
                'subtitle' => 'Introduction to Blogging',
                'content' => 'This is the content of the first blog post.',
                'slug' => 'first-blog-post',
                'author_id' => 1,
                'image' => 'image1.jpg',
                'thumbnail_image' => 'thumb1.jpg',
                'featured_image' => 'featured1.jpg',
                'seo_title' => 'First Blog Post SEO Title',
                'seo_description' => 'SEO description for the first blog post.',
                'meta_tags' => 'blog, first, introduction',
                'category' => 'General',
                'tags' => 'blogging, introduction',
                'state' => 'published',
                'language' => 'en',
                'additional_language' => null,
                'publish_date' => now(),
                'views_count' => 0,
                'read_time' => 5,
            ],
            [
                'title' => 'Second Blog Post',
                'subtitle' => 'Learning Laravel',
                'content' => 'This is the content of the second blog post.',
                'slug' => 'second-blog-post',
                'author_id' => 2,
                'image' => 'image2.jpg',
                'thumbnail_image' => 'thumb2.jpg',
                'featured_image' => 'featured2.jpg',
                'seo_title' => 'Second Blog Post SEO Title',
                'seo_description' => 'SEO description for the second blog post.',
                'meta_tags' => 'laravel, learning',
                'category' => 'Programming',
                'tags' => 'laravel, php',
                'state' => 'published',
                'language' => 'en',
                'additional_language' => null,
                'publish_date' => now(),
                'views_count' => 0,
                'read_time' => 7,
            ],
            // Add 3 more blog posts here with similar structure
        ];

        foreach ($blogPosts as $post) {
            BlogPost::create($post);
        }
    }
}
