<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'banner_image',
        'banner_title',
        'call_to_action_link',
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
