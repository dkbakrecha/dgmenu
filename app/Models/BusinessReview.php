<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessReview extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'business_id', 'user_id', 'user_name', 'email', 'phone_number', 'rating', 'comment'
    ];

    public function business()
    {
        return $this->belongsTo(BusinessListing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
