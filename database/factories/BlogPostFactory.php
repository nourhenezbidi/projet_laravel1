<?php

namespace Database\Factories;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;
    public function definition()
    {
        return [
            'title' => $this→faker→sentence,
            'subtitle' => $this→faker→sentence,
            'content' => $this→faker→paragraphs(3, true),
            'slug' => $this->faker->unique()->slug,
            'author_id' => 1, // Assumes a user exists
            'image' => $this→faker→imageUrl(),
            'thumbnail_image' => $this→faker→imageUrl(100, 100),
            'featured_image' => $this→faker→imageUrl(800, 400),
            'seo_title' => $this→faker→sentence,
            'seo_description' => $this→faker→text(150),
            'meta_tags' => implode(',', $this→faker→words(5)),
            'category' => $this→faker→word,
            'tags' => implode(',', $this→faker→words(3)),
            'state' => $this→faker→randomElement(['published', 'draft', 'archived', 'scheduled']),
            'language' => 'en',
            'additional_language' => $this->faker->optional()->randomElement(['fr', 'es']),
            'publish_date' => $this→faker→dateTimeThisYear,
            'views_count' => $this→faker→numberBetween(0, 1000),
            'read_time' => $this→faker→numberBetween(1, 15),
        ];
    }
}