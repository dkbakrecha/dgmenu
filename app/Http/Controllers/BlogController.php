<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::where('post_type', 2)
                     ->orderBy('id', 'desc')
                     ->paginate(10);
                     
        return view('front.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Post::where('title_slug', $slug)
                    ->where('post_type', 2)
                    ->firstOrFail();

        // Increment view count
        $blog->increment('view_count');

        return view('front.blog.show', compact('blog'));
    }
}
