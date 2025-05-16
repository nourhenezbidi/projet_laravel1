<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'background_image',
        'header_image',
        'call_to_action_link',
        'registration_link',
        'description',
        'landing_page_id', // ajouté
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}