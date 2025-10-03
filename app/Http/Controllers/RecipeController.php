<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Tag;

use App\Services\TelegramService;


class RecipeController extends Controller
{

    protected $telegramService;

    public function __construct(TelegramService $telegramService)
    {
        $this->telegramService = $telegramService;
    }

    public function index(Request $request)
    {
        $query = Recipe::query()->with('category', 'tags');
    
        // Handle search filter
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
    
        if ($request->has('category')) {
            //   $query->where('category_id', $request->category);
        }
    
        if ($request->has('tags')) {
            $query->whereHas('tags', function($q) use ($request) {
                $q->whereIn('id', $request->tags);
            });
        }
    
        // Sort by creation date in descending order and limit to 6 items
        $recipes = $query->orderBy('created_at', 'desc')->limit(6)->get();
    
        $categories = Category::all();
        $tags = Tag::all();
    
        return view('recipes.index', compact('recipes', 'categories', 'tags'));
    }

    public function show($slug)
    {
        $recipe = Recipe::with(['category', 'tags', 'comments.user'])->where('slug', $slug)->firstOrFail();
        return view('recipes.show', compact('recipe'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('recipes.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Create a new recipe instance
        $recipe = new Recipe();
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->steps = $request->steps;
        $recipe->category_id = $request->category_id;  // Set category_id explicitly
        $recipe->user_id = auth()->id();  // Associate the recipe with the current user

        // Handle image upload
        if ($request->hasFile('image')) {
            $recipe->image = $request->file('image')->store('images', 'public');
        }

        // Save the recipe
        $recipe->save();

        // Attach tags
        if ($request->tags) {
            $recipe->tags()->attach($request->tags);
        }

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }

    

    
    public function shareToTelegram($id)
    {
        // Fetch the blog post from the database
        $blog = Recipe::findOrFail($id);
       
        $blogLink = route('recipes.show', ['slug' => $blog->slug]);  // Assuming you have a route like blog.show

        // Share the blog content to Telegram
        $this->telegramService->sendBlogToTelegram(
            $blog->title,
            asset('storage/'.$blog->image), // Image URL
            $blog->ingredients,
            $blogLink
        );

        // Redirect back with a success message
        return redirect()->route('recipes.index')->with('success', 'Blog shared to Telegram successfully!');
    }

}
