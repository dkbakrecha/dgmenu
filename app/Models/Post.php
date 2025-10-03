<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title', 
        'title_slug', 
        'short_description', 
        'content', 
        'user_id', 
        'post_type', 
        'view_count', 
        'cover_image'
    ];


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['title_slug'] = Str::slug($value);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFeatured($query){
        return $query->where('featured', true);
    }

    public function previousPost()
    {
        return  Post::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

    public function nextPost()
    {
        return Post::where('id', '>', $this->id)->orderBy('id')->first();
    }

    public function getRouteKeyName()
    {
        return 'title_slug';
    }
}
