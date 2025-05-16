<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Pages extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'content', 'slug', 'image', 'thumbnail_image',
        'background_image', 'seo_title', 'seo_tags', 'meta_tags',
        'state', 'language', 'additional_language', 'publish_date', 'created_at', 'updated_at',
    ];
    protected $casts = [
        'publish_date' => 'datetime',
        'state' => 'string',
    ];
    public function authors()
    {
        return $this->belongsToMany(MenuIte::class, 'post_user')->withTimestamps();
    }
}