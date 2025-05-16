<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'label',
        'description',
        'image',
        'instructor',
        'review_count',
        'price',
        'discounted_price',
        'order',
    ];

    // Une formation a plusieurs inscriptions
    public function inscriptionSubmissions()
    {
        return $this->hasMany(InscriptionSubmission::class);
    }

    // Une formation appartient à plusieurs landing pages
    public function landingPages()
    {
        return $this->belongsToMany(LandingPage::class, 'landing_page_training')->withTimestamps();
    }
}
