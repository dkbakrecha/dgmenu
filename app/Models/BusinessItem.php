<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessItem extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'business_menu';


    protected $fillable = [
        'title', 
        'description', 
        'menu_image', 
        'user_id', 
        'business_id',
        'section_id',
        'price',
        'price_min',
    ];
}
