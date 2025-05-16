<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'slide_image',
        'slide_title',
        'slide_description',
        'slide_link',
        'slide_order',
        'carousel_id'
    ];

    public function carousel()
    {
        return $this->belongsTo(Carousel::class);
    }
}
