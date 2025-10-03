<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'room';

    protected $fillable = [
        'room_number', 
        'business_id', 
        'user_id', 
    ];

    public function Business(): BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
