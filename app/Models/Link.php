<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'label',
        'url',
        'type',
        'landing_page_id'

    ];

 
    public function LandingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
