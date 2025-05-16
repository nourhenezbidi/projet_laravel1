<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerCompany extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'url',
        'description',
        'landing_page_id'
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
