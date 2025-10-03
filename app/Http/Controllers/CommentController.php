<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    //
    public function store(Request $request, $recipeId)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'recipe_id' => $recipeId,
            'user_id' => auth()->id(),
            'content' => $request->input('content')
        ]);

        return back()->with('success', 'Comment added successfully.');
    }

}
