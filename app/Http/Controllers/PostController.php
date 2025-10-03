<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('featured', false)
                    ->where('post_type', 2)
                    ->with('user', 'categories')
                    ->orderBy('created', 'desc')
                    ->paginate(8);

        $featured = Post::featured()->take(3)->get();

        return view('front.index', [
            'posts' => $posts,
            'featured' => $featured
        ]);
    }

    public function exams(){
        $posts = Post::where('featured', false)
                    ->where('post_type', 3)
                    ->with('user', 'categories')
                    ->orderBy('created', 'desc')
                    ->paginate(8);

        $featured = Post::featured()->take(3)->get();

        return view('front.exams', [
            'posts' => $posts,
            'featured' => $featured
        ]);
    }

    public function notes(){
        $posts = Post::where('featured', false)
                    ->where('post_type', 1)
                    ->with('user', 'categories')
                    ->orderBy('created', 'desc')
                    ->paginate(8);

        $featured = Post::featured()->take(3)->get();

        return view('front.notes', [
            'posts' => $posts,
            'featured' => $featured
        ]);
    }

    public function practice(){
        return view('front.practice');
    }

    public function posts(){
        //return view('posts.index');
    }
    
    public function showPost(Post $post){
        $post = $post->load('user','categories');
        return view('front.show', compact('post'));
    }

    public function showCategory(Category $category){
        $posts = $category->posts()->get();
        return view('front.categories.show', compact('category', 'posts'));
    }
}
