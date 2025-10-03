<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessListing extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'business_name', 
        'business_description', 
        'contact_phone',
        'location',
        'contact_email',
    ];

    protected $table = 'business_listing';

    public function reviews()
    {
        return $this->hasMany(BusinessReview::class);
    }

    public function images()
    {
        return $this->hasMany(BusinessImage::class);
    }

}
