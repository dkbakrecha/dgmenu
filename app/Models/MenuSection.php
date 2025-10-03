<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuSection extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'menu_sections';

    protected $fillable = [
        'section_title', 
        'user_id', 
        'order_no',
        'status',
        'section_id',
        'item_order'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(BusinessItem::class, 'section_id');
    }
}