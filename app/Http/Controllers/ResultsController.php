<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ResultsController extends Controller
{
    public function index()
    {
        $results = Test::all()->load('user');

        //if (!Auth::user()->isAdmin()) {
        //    $results = $results->where('user_id', '=', Auth::id());
       // }

        return view('results.index', compact('results'));
    }

    public function show($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->get()
            ;
        }

        return view('results.show', compact('test', 'results'));
    }
}
