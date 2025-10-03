<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $fillable = ['query', 'type', 'user_id', 'searched_at'];
    public $timestamps = false;
}
