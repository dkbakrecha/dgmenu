<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'visitor';


    protected $fillable = [
        'visit_date',
        'visit_ip',
        'visit_page',
        'visit_business_id',
        'visit_device',
        'visit_ismobile',
        'visit_browser',
        'visit_platform'
    ];

    protected $casts = [
        'visit_date' => 'datetime:Y-m-d',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class, 'foreign_key', 'visit_business_id');
    }
}
