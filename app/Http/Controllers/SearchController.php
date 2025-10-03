<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessListing;
use App\Models\Recipe;
use App\Models\SearchLog;
class SearchController extends Controller
{
    // Display homepage
    public function index()
    {
        return view('homepage');
    }

    // Handle search query
    public function search(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type');
        $userId = auth()->id();

        // Log search entry
        SearchLog::create([
            'query' => $query,
            'type' => $type,
            'user_id' => $userId,
            'searched_at' => now(),
        ]);

        // Fetch results based on type
        $recipes = $type === 'restaurants' ? collect() : Recipe::where('title', 'like', "%{$query}%")->get();
        $restaurants = $type === 'recipes' ? collect() : BusinessListing::where('business_name', 'like', "%{$query}%")->get();

        return view('search.results', compact('recipes', 'restaurants', 'query', 'type'));
    }

    public function suggestions(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type');

        if ($type === 'recipes' || $type === 'all') {
            $recipes = Recipe::where('title', 'like', "%{$query}%")->limit(5)->get(['id', 'title']);
        } else {
            $recipes = collect();
        }

        if ($type === 'restaurants' || $type === 'all') {
            $restaurants = BusinessListing::where('business_name', 'like', "%{$query}%")->limit(5)->get(['id', 'business_name']);
        } else {
            $restaurants = collect();
        }

        return response()->json($recipes->merge($restaurants));
    }
}
