<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BlogPost extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'content', 'slug', 'author_id', 'image', 'thumbnail_image',
        'featured_image', 'seo_title', 'seo_description', 'meta_tags', 'category', 'tags',
        'state', 'language', 'additional_language', 'publish_date', 'views_count', 'read_time'
    ];
    protected $casts = [
        'publish_date' => 'datetime',
        'state' => 'string',
    ];
    public function authors()
    {
        return $this->belongsToMany(User::class, 'post_user')->withTimestamps();
    }
}