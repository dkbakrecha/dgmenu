<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'question', 
        'option1', 
        'option2', 
        'option3', 
        'option4', 
        'correct_option', 
        'user_id', 
        'sort_order', 
        'category_id', 
        'sub_category_id',
        'status', 
    ];
}