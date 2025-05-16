<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    protected $fillable = [
        'full_name',
        'description',
        'image',
        'display_order',
        'landing_page_id',
        'linkedin_url',
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class);
    }
}
