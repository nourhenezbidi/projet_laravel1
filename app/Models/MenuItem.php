<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'label', 'url', 'order', 'page_id', 'parent_id'
    ];

    // Relation vers une page liée à ce menu
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    // Menu hiérarchique : parent
    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    // Menu hiérarchique : enfants
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }
}
