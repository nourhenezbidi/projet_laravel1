<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'name'
    ];
    public function items()
{
    return $this->hasMany(CarouselSlide::class);
}

}