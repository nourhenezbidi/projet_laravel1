<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'blog_id',
        'user_id',  
        'created',
        'updated',
    ];

    protected $casts = [
        'created' => 'datetime',
        'updated' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function blog(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class, 'blog_id');
    }
}