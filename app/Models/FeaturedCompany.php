<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedCompany extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'slide_order',
        'landing_page_id',
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
