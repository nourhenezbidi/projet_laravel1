<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'adress',
        'phone_number',
        'contact_email',
        'social_media_links'
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
