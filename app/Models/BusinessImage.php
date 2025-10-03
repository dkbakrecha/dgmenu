<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessImage extends Model
{
    use HasFactory;

    protected $fillable = ['business_listing_id', 'image_path'];

    public function businessListing()
    {
        return $this->belongsTo(BusinessListing::class);
    }
}
