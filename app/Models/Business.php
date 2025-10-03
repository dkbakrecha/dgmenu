<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'business';


    protected $fillable = [
        'title', 
        'slug',
        'description', 
        'logo', 
        'user_id', 
        'contact',
        'address',
        'email_address',
        'theme'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

}