<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('category')->latest()->paginate(20);
        return view('admin.recipes.index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.recipes.create', compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:recipes,title',
            'description' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title','description','ingredients','steps','category_id']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('recipes','public');
        }

        $recipe = Recipe::create($data);

        if ($request->tags) {
            $recipe->tags()->sync($request->tags);
        }

        return redirect()->route('admin.recipes.index')
            ->with('success','Recipe created successfully.');
    }

    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.recipes.edit', compact('recipe','categories','tags'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'title' => 'required|unique:recipes,title,' . $recipe->id,
            'slug' => 'required',

            'description' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title','slug','description','ingredients','steps','category_id']);

        if ($request->hasFile('image')) {
            if ($recipe->image && file_exists(public_path('storage/'.$recipe->image))) {
                unlink(public_path('storage/'.$recipe->image));
            }
            $data['image'] = $request->file('image')->store('recipes','public');
        }

        $recipe->update($data);

        if ($request->tags) {
            $recipe->tags()->sync($request->tags);
        }

        return redirect()->route('recipes.index')
            ->with('success','Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        if ($recipe->image && file_exists(public_path('storage/'.$recipe->image))) {
            unlink(public_path('storage/'.$recipe->image));
        }

        $recipe->tags()->detach();
        $recipe->delete();

        return redirect()->route('admin.recipes.index')
            ->with('success','Recipe deleted successfully.');
    }
}
