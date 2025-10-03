<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks'; // Define table name

    protected $fillable = [
        'business_id',
        'mood',
        'feedback',
        'user_info',
        'browser_info',
    ];

    protected $casts = [
        'user_info' => 'array', // Automatically convert JSON to array
    ];

    /**
     * Relationship: Feedback belongs to a Business
     */
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
